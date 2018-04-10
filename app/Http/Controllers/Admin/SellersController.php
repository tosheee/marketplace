<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Admin\Seller;
use App\Admin\Country;
use App\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_sellers = Seller::orderBy('created_at', 'desc')->get();

        $user_id = array();
        $usersSellers = array();

        foreach ($all_sellers as $seller) {
            array_push($user_id, $seller->user_id);
        }

        $uniqueUsers = array_unique($user_id);

        foreach ($uniqueUsers as $user){
            array_push($usersSellers, User::find($user));
        }

        return view('admin.sellers.index')->with('usersSellers', $usersSellers)->with('title', 'All Sellers');
    }

    public function create()
    {
        $countries = Country::all();

        return view('admin.sellers.create')->with('countries', $countries);
    }

    public function store(Request $request)
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
        $seller->company_vat    = 'fasdfasdfa';//$request->input('company_vat_registered');
        $seller->company_phone  = $request->input('company_phone');
        //$seller->accept_terms   = $request->input('accept_terms');
        $seller->country_id     = $request->input('country_id');
        $seller->city_id        = $request->input('city_id');
        $seller->company_address       = $request->input('address_company');

        $seller->save();

        return redirect('/sellers/'.$request->input('user_id'))->with('success', 'The country is updated');
    }

    public function show($id)
    {
        $seller = Seller::find($id);
        $user   = User::find($seller->user_id);
        $products = Product::where('seller_id', $seller->user_id)->get();

        return view('admin.sellers.show')->with('seller', $seller)->with('user', $user)->with('products', $products)->with('title', 'View seller');
    }

    public function edit($id)
    {
        $countries = Country::all();
        $seller = Seller::find($id);

        return view('admin.sellers.edit')->with('seller', $seller)->with('title', 'Edit seller')->with('countries', $countries);
    }

    public function update(Request $request, $id)
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


        $seller = Seller::find($id);
        $seller->user_id           = $request->input('user_id');
        $seller->active_company    = $request->input('active_company');;
        $seller->brand_name        = $request->input('brand_name');
        $seller->brand_description = $request->input('brand_description');
        $seller->brand_logo        = '';
        $seller->brand_banner      = '';
        $seller->company_name      = $request->input('company_name');
        $seller->company_vat       = $request->input('company_vat_registered');
        $seller->company_phone     = $request->input('company_phone');
        //$seller->accept_terms    = $request->input('accept_terms');
        $seller->country_id        = $request->input('country_id');
        $seller->city_id           = $request->input('city_id');
        $seller->company_address   = $request->input('address_company');
        $seller->save();

        return redirect('/admin/sellers')->with('success', 'The country is updated');
    }

    public function destroy($id)
    {
        $seller = Seller::find($id);
        $seller->delete();

        return redirect('/admin/sellers')->with('message', 'The seller was delete');
    }

    public function postChangeRoles(Request $request, $id)
    {
        $user =  User::find($request->input('user_id'));
        $user->roles()->detach();

        if($request['role_user']){
        $user->roles()->attach(Role::where('name', 'User')->first());
        }

        if($request['role_buyer']){
            $user->roles()->attach(Role::where('name', 'Buyer')->first());
        }

        if($request['role_seller']){
            $user->roles()->attach(Role::where('name', 'Seller')->first());
        }

        return redirect('admin/sellers')->with('success', 'The user is updated');
    }
}
