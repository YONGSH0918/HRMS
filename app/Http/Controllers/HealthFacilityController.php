<?php

namespace App\Http\Controllers;

use App\Models\HealthFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HealthFacilityController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }
    //
    public function add()
    {
        return view('admin.healthFacility-mgmt.addHealthFacility');
    }

    public function store()
    {    //step 2 
        $r = request(); //step 3 get data from HTML

        $addCPD = HealthFacility::create([    //step 3 bind data
            'name' => $r->name, //add on 
            'address' => $r->address, //id

        ]);


        Session::flash('success', "Add New Health Facility Succesful!");

        return redirect()->route('viewHealthFacility');
    }

    public function show()
    {

        $hfs = HealthFacility::all();

        return view('admin.healthFacility-mgmt.index')->with('hfs', $hfs);
    }


    //find employee to edit
    public function edit($id)
    {

        $hfs = HealthFacility::all()->where('id', $id);

        return view('admin.healthFacility-mgmt.edit')->with('hfs', $hfs);
    }

    public function delete($id)
    {
        $hfs = HealthFacility::find($id);
        $hfs->delete();

        Session::flash('delete', "Deleted Succesful!");
        return redirect()->route('viewHealthFacility');
    }

    //edit
    public function update()
    {
        $r = request(); //retrive submited form data
        $hfs = HealthFacility::find($r->ID);  //get the record based on product ID      

        $hfs->name = $r->name;
        $hfs->address = $r->address;
        $hfs->save(); //run the SQL update statment
        Session::flash('update', "Updated Succesful!");
        return redirect()->route('viewHealthFacility');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $hfs = DB::table('health_facilities')
            ->where('id', 'like', '%' . $keyword . '%')
            ->orWhere('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.healthFacility-mgmt.search')->with('hfs', $hfs);
    }
}
