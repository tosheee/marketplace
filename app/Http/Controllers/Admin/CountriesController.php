<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Country;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $countries = Country::all();

        return view('admin.countries.index')->with('countries', $countries)->with('title', 'Countries');
    }

    public function create()
    {
        return view('admin.countries.create')->with('title', 'Create country');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'active_countries'   => 'required',
            'country_name'       => 'required',
            'country_identifier' => 'required',
        ]);

        $country = new Country;

        $country->active_countries   = $request->input('active_countries');
        $country->country_name       = $request->input('country_name');
        $country->country_identifier = $request->input('country_identifier');
        $country->save();

        return redirect('/admin/countries')->with('success', 'The country is updated');
    }

    public function edit($id)
    {
        $country = Country::find($id);

        return view('admin.countries.edit')->with('country', $country)->with('title', 'Update country');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'active_countries'   => 'required',
            'country_name'       => 'required',
            'country_identifier' => 'required',
        ]);

        $country = Country::find($id);

        $country->active_countries   = $request->input('active_countries');
        $country->country_name       = $request->input('country_name');
        $country->country_identifier = $request->input('country_identifier');
        $country->save();

        return redirect('/admin/sub_categories')->with('success', 'Подкатегорията е обновена');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect('/admin/countries')->with('success', 'The country is deleted');

    }
}
