<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use DB;

class testController extends Controller
{
    function create()
    {
        return view('textpage');
    }

    function store(Request $request)
    {
        $addAddress = Test::create([
            'address' => $request -> address,
            'state' => $request -> state,
            'city' => $request -> city,
            'zipcode' => $request -> zipcode,
        ]);

        return redirect()->route('showTest');
    }

    function show()
    {
        $tests = DB::table('tests')
        ->select("*", DB::raw("CONCAT(tests.address,' ',tests.state) AS address"))
        ->get();
        
        return view('textshow',compact('tests'));
    }

}
