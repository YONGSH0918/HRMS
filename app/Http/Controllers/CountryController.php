<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use DB;

class CountryController extends Controller
{
    function create()
    {
        return view('admin.addcountry');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $countries = new Country;

        $countries->name = $request->input('name');
        
        $countries->save();

        Session::flash('success', "Country added.");
        return redirect()->route('showCountry');
    }

    function show()
    {
        $countries = Country::all();
        return view('admin.countrypage')->with('countries', $countries);
    }

    function edit($id)
    {
        $countries = Country::find($id);
        return view('admin.editcountry', compact('countries','id'));
    }

    function update()
    {
        $r=request();
        $countries = Country::find($r->ID);

        $countries->name=$r->name;
        
        $countries->save();
        return redirect()->route('showCountry');
    }

    function delete($id)
    {
        $countries = Country::find($id);
        $countries->delete();

        Session::flash('success', 'Counrty deleted.');
        return redirect()->route('showCountry');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $countries = DB::table('countries')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('admin.countrypage')->with('countries', $countries);
    }
}
