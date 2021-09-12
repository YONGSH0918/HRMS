<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class CertificateController extends Controller
{
    //
    function create()
    {
        return view('addcert');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'certificate_name' => 'required',
        ]);

        $certificates = new Certificate;

        $certificates->certificate_name = $request->input('certificate_name');
        
        $certificates->save();

        Session::flash('success', "Certificate added.");
        return redirect()->route('showCert');
    }

    function show()
    {
        $certificates = Certificate::paginate(10);
        return view('certificatepage')->with('certificates', $certificates);
    }

    function edit($id)
    {
        $certificates = Certificate::find($id);
        return view('editcert', compact('certificates','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $certificates = Certificate::find($r->ID);

        $certificates->certificate_name=$r->certificate_name;
        
        $certificates->save(); //run the SQL update statment
        return redirect()->route('showCert');
    }

    function delete($id)
    {
        $certificates = Certificate::find($id);
        $certificates->delete();

        Session::flash('success', "Certificate added.");
        return redirect()->route('showCert');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $certificates = DB::table('certificates')
        ->where('certificate_name', 'like', '%' .$keyword. '%')
        ->get();

        return view('certificatepage')->with('certificates', $certificates);
    }
    
}
