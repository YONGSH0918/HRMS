<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class LeavetypeController extends Controller
{
    function create()
    {
        return view('addleavetype');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
        ]);

        $leavetypes = new LeaveType;

        $leavetypes->name = $request->input('name');
        $leavetypes->entitleDays = $request->input('entitleDays');

        $leavetypes->save();

        Session::flash('success', 'Leave type successfully added.');
        return redirect()->route('showLeavetype');
    }

    function show()
    {
        $leavetypes = LeaveType::paginate(10);
        return view('leavetypepage')->with('leavetypes', $leavetypes);
    }

    function edit($id)
    {
        $leavetypes = LeaveType::find($id);
        return view('editleavetype', compact('leavetypes','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $leavetypes = LeaveType::find($r->ID);

        $leavetypes->name=$r->name;
        $leavetypes->entitleDays = $r->entitleDays;
        
        $leavetypes->save(); //run the SQL update statment
        return redirect()->route('showLeavetype');
    }

    function delete($id)
    {
        $leavetypes = LeaveType::find($id);
        $leavetypes->delete();

        Session::flash('success', 'Leave type successfully deleted.');
        return redirect()->route('showLeavetype');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $leavetypes = DB::table('leavetypes')
        ->where('name', 'like', '%' .$keyword. '%')
        ->orWhere('entitleDays', 'like', '%' .$keyword. '%')
        ->get();

        return view('leavetypepage')->with('leavetypes', $leavetypes);
    }
}
