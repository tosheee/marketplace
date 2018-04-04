<?php

namespace App\Http\Controllers;

use Image;
use App\Order;
use App\Admin\Country;
use App\Admin\Seller;

use App\Admin\SubCategory;
use App\Admin\Category;
use App\Admin\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AccountsController extends Controller
{

    //public function __construct()
    //{
      // $this->middleware('auth');
    //}

    public function index($id){
        $ordersIntoSeller = Order::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('accounts.index')->with('ordersIntoSeller', $ordersIntoSeller)->with('success', 'Index page');
    }

    // show users orders
    public function viewUserOrders($id)
    {
        if (Auth::check() && Auth::user()->id == $id)
        {

            $userOrders = Order::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(18);

            return view('accounts.view-user-orders')->with('user_orders', $userOrders);
        }
        else
        {
            return view('errors.404');
        }
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);

        return view('accounts.index')->with('orders', $orders)->with('title', 'Orders');
    }

    public function createSeller(){

        $countries = Country::all();

        return view('accounts.create_seller')->with('countries', $countries);
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

        return redirect('/account/'.$request->input('user_id'))->with('success', 'Your query is ');
    }
}
