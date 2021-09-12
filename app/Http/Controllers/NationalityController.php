<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class NationalityController extends Controller
{
    function create()
    {
        return view('addnationality');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $nationalities = new Nationality;

        $nationalities->name = $request->input('name');
        
        $nationalities->save();

        Session::flash('success', "Nationality added.");
        return redirect()->route('showNationality');
    }

    function show()
    {
        $nationalities = Nationality::paginate(10);
        return view('nationalitypage')->with('nationalities', $nationalities);
    }

    function edit($id)
    {
        $nationalities = Nationality::find($id);
        return view('editnationality', compact('nationalities','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $nationalities = Nationality::find($r->ID);

        $nationalities->name=$r->name;
        
        $nationalities->save(); //run the SQL update statment
        return redirect()->route('showNationality');
    }

    function delete($id)
    {
        $nationalities = Nationality::find($id);
        $nationalities->delete();

        Session::flash('success', "Nationality deleted.");
        return redirect()->route('showNationality');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $nationalities = DB::table('nationalities')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('nationalitypage')->with('nationalities', $nationalities);
    }
}
