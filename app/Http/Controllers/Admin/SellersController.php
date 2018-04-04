<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Admin\Seller;
use App\Admin\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sellers = Seller::all();

        return view('admin.sellers.index')->with('all_sellers', $all_sellers)->with('title', 'All Sellers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $seller = Seller::find($id);

        return view('admin.sellers.edit')->with('seller', $seller)->with('title', 'Edit seller')->with('countries', $countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $seller = new Seller;
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

        return redirect('/account')->with('success', 'The country is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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