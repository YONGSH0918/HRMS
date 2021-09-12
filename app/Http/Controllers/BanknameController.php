<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankname;
use Session;
use DB;

class BanknameController extends Controller
{
    function create()
    {
        return view('admin.addbankname');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $banknames = new Bankname;

        $banknames->name = $request->input('name');
        
        $banknames->save();

        Session::flash('success', "Bank successfully added.");
        return redirect()->route('showBankname');
    }

    function show()
    {
        $banknames = Bankname::all();
        return view('admin.banknamepage')->with('banknames', $banknames);
    }

    function edit($id)
    {
        $banknames = Bankname::find($id);
        return view('admin.editbankname', compact('banknames','id'));
    }

    function update()
    {
        $r=request();
        $banknames = Bankname::find($r->ID);

        $banknames->name=$r->name;
        
        $banknames->save();
        return redirect()->route('showBankname');
    }

    function delete($id)
    {
        $banknames = Bankname::find($id);
        $banknames->delete();

        Session::flash('success', 'Bank successfully deleted.');
        return redirect()->route('showBankname');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $banknames = DB::table('banknames')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('admin.banknamepage')->with('banknames', $banknames);
    }
}
