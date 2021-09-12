<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeCareerPathInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CPDController extends Controller
{


    //turn page
    public function addCPD($id)
    {
        $employees = Employee::all()->where('id', $id);

        return view('career-path-mgmt/addCPD')->with('employees', $employees);
    }


    //addEmployee
    public function storeCPD()
    {    //step 2 
        $r = request(); //step 3 get data from HTML

        $addCPD = EmployeeCareerPathInfo::create([    //step 3 bind data
            'employee_CareerPath_Info_ID' => $r->employee_CareerPath_Info_ID, //add on 
            'employee_ID' => $r->employee_ID, //id
            'employee_Name' => $r->employee_Name, //id
            'supervisor_Name' => $r->supervisor_Name,
            'current_JobTitle' => $r->current_JobTitle,
            'program_Title' => $r->program_Title,
            'program_Desc' => $r->program_Desc,
            'periodPlan_From' => $r->periodPlan_From,
            'periodPlan_To' => $r->periodPlan_To,
            'tranningOrCourse_Name' => $r->tranningOrCourse_Name,
            'scheduled_Date_Completed' => $r->scheduled_Date_Completed,

        ]);


        Session::flash('success', "Add New Employee Career Path Development Succesful!");

        return redirect()->route('viewCPD');
    }

    //show employee
    public function show()
    {

        $employees = Employee::paginate(5);

        return view('career-path-mgmt/index')->with('employees', $employees);
    }

    public function showCPD()
    {

        $cpds = EmployeeCareerPathInfo::paginate(5);

        return view('career-path-mgmt/indexCPD')->with('cpds', $cpds);
    }

    //find employee to edit
    public function editCPD($id)
    {

        $cpds = EmployeeCareerPathInfo::all()->where('id', $id);

        return view('career-path-mgmt/edit')->with('cpds', $cpds)
            ->with('employees', Employee::all());
    }

    public function delete($id)
    {
        $cpds = EmployeeCareerPathInfo::find($id);
        $cpds->delete();

        Session::flash('delete', "Deleted Succesful!");
        return redirect()->route('viewCPD');
    }

    //edit
    public function updateCPD()
    {
        $r = request(); //retrive submited form data
        $cpds = EmployeeCareerPathInfo::find($r->ID);  //get the record based on product ID      

        $cpds->employee_CareerPath_Info_ID = $r->employee_CareerPath_Info_ID;
        $cpds->employee_ID = $r->employee_ID;
        $cpds->supervisor_Name = $r->supervisor_Name;
        $cpds->current_JobTitle = $r->current_JobTitle;
        $cpds->program_Title = $r->program_Title;
        $cpds->program_Desc = $r->program_Desc;
        $cpds->periodPlan_From = $r->periodPlan_From;
        $cpds->periodPlan_To = $r->periodPlan_To;
        $cpds->tranningOrCourse_Name = $r->tranningOrCourse_Name;
        $cpds->scheduled_Date_Completed = $r->scheduled_Date_Completed;
        $cpds->save(); //run the SQL update statment
        Session::flash('update', "Updated Succesful!");
        return redirect()->route('viewCPD');
    }

    //search employee
    function searchCPD()
    {
        $request = request();
        $keyword = $request->search;
        $cpds = DB::table('employee_career_path_infos')
            ->where('employee_CareerPath_Info_ID', 'like', '%' . $keyword . '%')
            ->orWhere('employee_ID', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('career-path-mgmt/searchCPD')->with('cpds', $cpds);
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $employees = DB::table('employees')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('department', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('career-path-mgmt/search')->with('employees', $employees);
    }


    public function showCPDDetail($id)
    {

        $cpds = EmployeeCareerPathInfo::all()->where('id', $id);
        //select * from products where id='$id'

        return view('career-path-mgmt/profileCPD')->with('cpds', $cpds);
    }
}
