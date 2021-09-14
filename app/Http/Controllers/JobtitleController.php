<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobtitle;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class JobtitleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function create()
    {
        return view('admin.addjobtitle')
            ->with('positions', Position::all())
            ->with('departments', Department::all());
    }

    function store(Request $request)
    {
        $addDepartment = Jobtitle::create([    //step 3 bind data
            'id' => $request->ID, //add on 
            'jobtitle_name' => $request->position, //fullname from HTML
            'department_id' => $request->department,
            'rate_per_hour' => $request->rate_per_hour,

        ]);

        Session::flash('success', "Job Title added.");
        return redirect()->route('showJobtitle');
    }

    function show()
    {
        $jobtitles = Jobtitle::all();
        return view('admin.jobtitle')->with('jobtitles', $jobtitles)
            ->with('positions', Position::all())
            ->with('departments', Department::all());
    }

    function edit($id)
    {
        $jobtitles = Jobtitle::all()->where('id', $id);

        return view('admin.jobtitle')->with('jobtitles', $jobtitles)
            ->with('positions', Position::all())
            ->with('departments', Department::all());
    }

    function update()
    {
        $r = request(); //retrive submited form data 
        $jobtitles = Jobtitle::find($r->ID);

        $jobtitles->jobtitle_name = $r->position;
        $jobtitles->department_id = $r->department;
        $jobtitles->rate_per_hour = $r->rate_per_hour;

        $jobtitles->save();
        return redirect()->route('showJobtitle');
    }

    function delete($id)
    {
        $jobtitles = Jobtitle::find($id);
        $jobtitles->delete();

        Session::flash('success', "Job title deleted.");
        return redirect()->route('showJobtitle');
    }
}
