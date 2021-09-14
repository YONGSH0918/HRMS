<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;
use App\Models\Workingtime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EmploymentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    function create()
    {
        return view('admin.addemployment')->with('workingtimes', Workingtime::all());
    }

    function store(Request $request)
    {
        $addWorkingtime=Employment::create([    
            'id'=>$request->ID,  
            'employment_name'=>$request->employment_name, 
            'workingtime_id'=>$request->worktime,
        ]);
        
        Session::flash('success', "Employment added.");
        return redirect()->route('showEmployment');
    }

    function show()
    {
        $employments = Employment::all();
        return view('admin.employmentpage')->with('employments', $employments)
                                           ->with('workingtimes', Workingtime::all());
    }

    function edit($id)
    {
        $employments = Employment::all()->where('id',$id);

        return view('admin.employmentpage')->with('employments', $employments)
                                           ->with('wokingtimes', Workingtime::all());
    }

    function update()
    {
        $r=request();
        $employments = Employment::find($r->ID);

        $employments->employment_name=$r->employment_name;
        $employments->workingtime_id=$r->worktime;
        
        $employments->save();
        return redirect()->route('showEmployment');
    }

    function delete($id)
    {
        $employments = Employment::find($id);
        $employments->delete();

        Session::flash('success', "Employment deleted.");
        return redirect()->route('showEmployment');
    }
}
