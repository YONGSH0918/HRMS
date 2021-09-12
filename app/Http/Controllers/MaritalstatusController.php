<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statusmarital;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class MaritalstatusController extends Controller
{
    function create()
    {
        return view('addmarital');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'maritalstatus_name' => 'required',
        ]);

        $statusmaritals = new Statusmarital;

        $statusmaritals->maritalstatus_name = $request->input('maritalstatus_name');
        
        $statusmaritals->save();

        Session::flash('success', "Marital Status added.");
        return redirect()->route('showMarital');
    }

    function show()
    {
        $statusmaritals = Statusmarital::paginate(10);
        return view('maritalpage')->with('statusmaritals', $statusmaritals);
    }

    function edit($id)
    {
        $statusmaritals = Statusmarital::find($id);
        return view('editmarital', compact('statusmaritals','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $statusmaritals = Statusmarital::find($r->ID);

        $statusmaritals->maritalstatus_name=$r->maritalstatus_name;
        
        $statusmaritals->save(); //run the SQL update statment
        return redirect()->route('showMarital');
    }

    function delete($id)
    {
        $statusmaritals = Statusmarital::find($id);
        $statusmaritals->delete();

        Session::flash('success', "Marital Status deleted.");
        return redirect()->route('showMarital');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $statusmaritals = DB::table('statusmaritals')
        ->where('maritalstatus_name', 'like', '%' .$keyword. '%')
        ->paginate(10);

        return view('maritalpage')->with('statusmaritals', $statusmaritals);
    }
}
