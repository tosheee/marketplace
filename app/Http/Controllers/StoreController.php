<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Like;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Admin\SubCategory;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\UserMessage;
use App\Order;
use App\Admin\Page;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    // show all products
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('active', true)->paginate(18);

        return view('store.index')->with('categories', $categories)->with('subCategories', $subCategories)->with('products', $products);
    }
    
    // show product
    public function show($id)
    {   if( ctype_digit ($id))
        {
            $product = Product::find($id);
            $categories = Category::all();
            $subCategories = SubCategory::all();

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
        }
        else
        {
            return view('errors.404');
        }
        
        if(isset($product))
        {
            $metaDescription = json_decode($product->description, true);
            return view('store.show')->with('categories', $categories)->with('subCategories', $subCategories)->with('product', $product)->with('cart', $cart)->with('metaDescription', $metaDescription);
        }
        else
        {
            return view('errors.404');
        }
    }

    public function getLikeProduct($id)
    {
        $oldLikes = Like::where('product_id', $id)->get();
        $userInfo = \Auth::user();
        $status = true;

        if (isset($userInfo))
        {
            $userInfo = $userInfo->id;
        }
        else
        {
            $userInfo = \Request::ip();
        }

        foreach($oldLikes as $oldLike)
        {
            if($oldLike->user_ip == $userInfo)
            {
                $status = false;
                break;
            }
        }

        if($status == true)
        {
            $like = new Like;
            $like->product_id = $id;
            $like->user_ip = $userInfo;
            $like->likes  = true;
            $like->save();
        }

        $allLikes = count(Like::all());
        
        return $allLikes;
    }

    // shopping_cart
    public function getCart()
    {
        if(!Session::has('cart'))
        {
            return view('store.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('store.shopping-cart')->with('products', $cart->items)->with('totalPrice', $cart->totalPrice)->with('totalQuantity', $cart->totalQty);
    }
    
    
    // checkout
    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('store.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('store.checkout')->with('cart', $cart);
    }
    
    // record checkout
    public function postCheckout(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required',
            'last_name'       => 'required',
            'email'           => 'required',
            'phone'           => 'required',
            'address'         => 'required',
            'delivery_method' => 'required',
            'payment_method'  => 'required',
        ]);

        if(!Session::has('cart'))
        {
            return redirect()->route('store.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $delivery_address = json_encode( $request->input('address'), JSON_UNESCAPED_UNICODE );
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->user_id         = $request->input('user_id');
        $order->name            = $request->input('name');
        $order->last_name       = $request->input('last_name');
        $order->email           = $request->input('email');
        $order->phone           = $request->input('phone');
        $order->address         = $delivery_address;
        $order->delivery_method = $request->input('delivery_method');
        $order->payment_method  = $request->input('payment_method');
        $order->company         = $request->input('company');
        $order->bulstat         = $request->input('bulstat');
        $order->note            = $request->input('note');
        $order->cart = base64_encode(serialize($cart));

        if(isset(Auth::user()->name))
        {
            Auth::user()->orders()->save($order);
        }
        else
        {
            $order->save();
        }

        Session::forget('cart');

        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('active', true)->paginate(18);

        return view('store.index')->with('categories', $categories)->with('subCategories', $subCategories)->with('products', $products);
        
    }

    // show-pages
    public function getShowPages(Request $request)
    {
        $active_page = Page::where('active_page', true)->get();
        $page = $active_page->where('url_page', $request->input('show'))->first();
         
        if(isset($page))
        {
        	return view('store.show-pages')->with('page', $page);
        } 
        else
        {
        	return $this->index();
        }
    }

     // add & remove products
    public function getAddToCart(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->input('product_quantity'));
        $request->session()->put('cart', $cart);
        $cart_product = [$cart->totalPrice, $cart->totalQty, $cart->items];
        
        return $cart_product;
       }

    public function getRemoveItem($id)
    {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }

        $cart_product = [$cart->totalPrice, $cart->totalQty, $cart->items];

        return $cart_product;
    }

   public function postUserMessage(Request $request)
   {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required',
            'message' => 'required',
        ]);

        $userMessage = new UserMessage;
        $userMessage->name    = $request->input('name');
        $userMessage->email   = $request->input('email');
        $userMessage->message = $request->input('message');
        $userMessage->save();

        return redirect()->back()->with('success', ['your message,here']);   
   }
}
