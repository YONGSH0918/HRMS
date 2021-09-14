<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    function create()
    {
        return view('admin.addPosition');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $positions = new Position;

        $positions->name = $request->input('name');
        
        $positions->save();

        Session::flash('success', "Position successfully added.");
        return redirect()->route('showPosition');
    }

    function show()
    {
        $positions = Position::all();
        return view('admin.positionpage')->with('positions', $positions);
    }

    function edit($id)
    {
        $positions = Position::find($id);
        return view('admin.editposition', compact('positions','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $positions = Position::find($r->ID);

        $positions->name=$r->name;
        
        $positions->save(); //run the SQL update statment
        return redirect()->route('showPosition');
    }

    function delete($id)
    {
        $positions = Position::find($id);
        $positions->delete();

        Session::flash('success', "Position successfully deleted.");
        return redirect()->route('showPosition');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $positions = DB::table('positions')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('admin.positionpage')->with('positions', $positions);
    }
}

