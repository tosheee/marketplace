<?php

namespace App\Http\Controllers;

use App\Order;
use ImagesHelper;
use App\Admin\Category;
use App\Admin\SubCategory;
use App\Admin\Product;
use App\Admin\Country;
use App\Admin\Seller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\DB;
//use Image;


class SellersController extends Controller
{
    public function index($id){

        $ordersIntoSeller = Order::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('sellers.index')->with('ordersIntoSeller', $ordersIntoSeller);
    }

    public function createSeller(){

        $countries = Country::all();

        return view('sellers.create_seller')->with('countries', $countries);
    }

    public function storeSeller(Request $request)
    {
        /* $this->validate($request, [
             'user_id'          => 'required',
             'brand_name'       => 'required',
             'company_name'     => 'required',
             'company_uic'      => 'required',
             'company_vat_registered' => 'required',
             'company_phone'    => 'required',
             'accept_terms'     => 'required',
             'country_id'       => 'required',
             'city_id'          => 'required',
             'address_company'  => 'required',
             'brand_description'=> 'required'

         ]);*/


        $seller = new Seller;

        $seller->user_id        = $request->input('user_id');
        $seller->active_company = 0;
        $seller->brand_name     = $request->input('brand_name');
        $seller->brand_description    = $request->input('brand_description');
        $seller->brand_logo     = '';
        $seller->brand_banner   = '';
        $seller->company_name   = $request->input('company_name');
        $seller->company_vat    = $request->input('company_vat_registered');
        $seller->company_phone  = $request->input('company_phone');
        //$seller->accept_terms   = $request->input('accept_terms');
        $seller->country_id     = $request->input('country_id');
        $seller->city_id        = $request->input('city_id');
        $seller->company_address       = $request->input('address_company');
        $seller->save();

        return redirect('/sellers/'.$request->input('user_id'))->with('success', 'The country is updated');
    }


    public function showSeller($seller_id)
    {
        $seller = Seller::find($seller_id);
        $products_seller = Product::where('seller_id', $seller_id)->get();

        return view('sellers.show_seller')->with('seller', $seller)->with('products_seller', $products_seller);
    }

    public function createProduct()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('sellers.create_product')->with('categories', $categories)->with('subCategories', $subCategories)->with('title', 'Създаване на продукт');
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request, [
            'user_id'     => 'required',
            'category_id'     => 'required',
            'sub_category_id' => 'required',
        ]);

        $productId = ImagesHelper::getLastProductId() + 1;
        $descriptionRequest =  $request->input('description');

        if($request->hasFile('upload_main_picture'))
        {
            $descriptionRequest['upload_main_picture'] = ImagesHelper::resizeImages($request->file('upload_main_picture'), $productId, $request->input('watermark_checked'), 1000, 1000);
        }
        else
        {
            $descriptionRequest['upload_main_picture'] = 'noimage.jpg';
        }

        if($request->hasFile('upload_gallery_pictures') && $request->hasFile('upload_main_picture'))
        {
            $files_gallery_pic = $request->file('upload_gallery_pictures');

            for($i = 0; $i < count($files_gallery_pic); $i++)
            {
                $descriptionRequest['gallery'][$i]['upload_picture'] = ImagesHelper::resizeImages($files_gallery_pic[$i], $productId, $request->input('watermark_checked'), 1000, 1000);
            }
        }

        $seller_id = Seller::where('user_id', $request->input('user_id'))->first()->id;
        $description = json_encode( $descriptionRequest, JSON_UNESCAPED_UNICODE );

        // Create product
        $product = new Product;
        $product->user_id         = $request->input('user_id');
        $product->seller_id       = $seller_id;
        $product->category_id     = $request->input('category_id');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->identifier      = preg_replace('/\s+/', '_', strtolower($request->input('sub_category_id')));
        $product->active          = $request->input('active');
        $product->sale            = $request->input('sale');
        $product->recommended     = $request->input('recommended');
        $product->best_sellers    = $request->input('best_sellers');
        $product->description     = $description;
        $product->save();

        session()->flash('notify', 'Продукта е създаден');

        return redirect('/sellers/'.$request->input('user_id').'/create_product');
    }

    public function insertedProducts($id)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $insertedProducts = Product::where('seller_id', $id)->orderBy('created_at', 'desc')->get();

        return view('sellers.inserted_products')->with('categories', $categories)->with('subCategories', $subCategories)->with('insertedProducts', $insertedProducts)->with('title', 'Orders');
    }

}