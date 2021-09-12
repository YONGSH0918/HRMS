<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Session;
use DB;

class DepartmentController extends Controller
{
    function create()
    {
        return view('admin.adddepartment');
    }

    function store(Request $request)
    {
        $this->validate($request,[
            'department_name' => 'required',
        ]);

        $addDepartment = Department::create([
            'department_name' => $request->department_name
        ]);

        Session::flash('success', "Department added.");
        return redirect()->route('showDept');
    }

    function show()
    {
        $departments = Department::all();
        return view('admin.departmentpage')->with('departments', $departments);
    }

    function edit($id)
    {
        $departments = Department::find($id);
        return view('admin.editdepartment',compact('departments','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $departments = Department::find($r->ID);

        $departments->department_name=$r->department_name;
        
        $departments->save(); //run the SQL update statment
        return redirect()->route('showDept');
    }

    function delete($id)
    {
        $departments = Department::find($id);
        $departments->delete();

        Session::flash('success', "Department deleted.");
        return redirect()->route('showDept');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $departments = DB::table('departments')
        ->where('department_name', 'like', '%' . $keyword . '%')
        ->get();
        
        return view('admin.departmentpage')->with('departments', $departments);
    }
}
