<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Session;
use DB;

class CityController extends Controller
{
    //
    function create()
    {
        return view('admin.addcity');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $addcity = City::create([
            'name' => $request->name
        ]);

        Session::flash('success', "City added.");
        return redirect()->route('showCity');
    }

    function show()
    {
        $cities = City::all();
        return view('admin.citypage')->with('cities', $cities);
    }

    function edit($id)
    {
        $cities = City::find($id);
        return view('admin.editcity',compact('cities','id'));
    }

    function update()
    {
        $r=request(); 
        $cities = City::find($r->ID);

        $cities->name=$r->name;
        
        $cities->save();
        return redirect()->route('showCity');
    }

    function delete($id)
    {
        $cities = City::find($id);
        $cities->delete();

        Session::flash('success', "City deleted.");
        return redirect()->route('showCity');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $cities = DB::table('cities')
        ->where('name', 'like', '%' . $keyword . '%')
        ->get();
        
        return view('admin.citypage')->with('cities', $cities);
    }
}
