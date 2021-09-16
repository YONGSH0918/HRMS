<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\EmployeeCareerPathInfo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class CPDController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //turn page
    public function addCPD($id)
    {
        $employees = Employee::all()->where('id', $id);
        $supervisors = Employee::all();

        return view('admin.career-path-mgmt.addCPD')
            ->with('supervisors', $supervisors)
            ->with('employees', $employees);
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
            'status' => $r->status,
            'scheduled_Date_Completed' => $r->scheduled_Date_Completed,

        ]);


        Session::flash('success', "Add New Employee Career Path Development Succesful!");

        return redirect()->route('viewCPD');
    }

    //show employee
    public function show()
    {

        $employees = Employee::all();

        return view('admin.career-path-mgmt.index')->with('employees', $employees);
    }

    public function showCPD()
    {

        $cpds = EmployeeCareerPathInfo::all();
        $cpdS = DB::table('employee_career_path_infos')
            ->get();

        foreach ($cpdS as $cpd) {
            $cpd = EmployeeCareerPathInfo::find($cpd->id);
            $today = Carbon::now();
            $toDate = $cpd->periodPlan_To;
            if ($today->gt($toDate)) {
                $cpd->status = 'Incompleted';
                $cpd->save();
            }
        }

        return view('admin.career-path-mgmt.indexCPD')->with('cpds', $cpds);
    }

    //find employee to edit
    public function editCPD($id)
    {

        $cpds = EmployeeCareerPathInfo::all()->where('id', $id);
        $supervisors = Employee::all();

        return view('admin.career-path-mgmt/edit')->with('cpds', $cpds)
            ->with('supervisors', $supervisors)
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
        $cpds->status = $r->status;
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
            ->orWhere('status', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.career-path-mgmt.searchCPD')->with('cpds', $cpds);
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $employees = DB::table('employees')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('department', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.career-path-mgmt.search')->with('employees', $employees);
    }


    public function showCPDDetail($id)
    {

        $cpds = EmployeeCareerPathInfo::all()->where('id', $id);
        //select * from products where id='$id'

        return view('admin.career-path-mgmt.profileCPD')->with('cpds', $cpds);
    }

    //-----------------------------------------------------------------//


    public function showMeCPD()
    {

        $cpds = EmployeeCareerPathInfo::all()->where('employee_ID', Auth::id());
        $cpdS = DB::table('employee_career_path_infos')
            ->get();

        foreach ($cpdS as $cpd) {
            $cpd = EmployeeCareerPathInfo::find($cpd->id);
            $today = Carbon::today();
            $toDate = $cpd->periodPlan_To;
            if ($today->gt($toDate)) {
                $cpd->status = 'Incompleted';
                $cpd->save();
            }
        }

        return view('employee.career-path-mgmt.indexCPD')->with('cpds', $cpds);
    }

    public function showMeCPDDetail($id)
    {

        $cpds = EmployeeCareerPathInfo::all()->where('id', $id);
        //select * from products where id='$id'

        return view('employee.career-path-mgmt.profileCPD')->with('cpds', $cpds);
    }

    function searchMeCPD()
    {
        $request = request();
        $keyword = $request->search;
        $cpds = DB::table('employee_career_path_infos')
            ->where('employee_CareerPath_Info_ID', 'like', '%' . $keyword . '%')
            ->orWhere('status', 'like', '%' . $keyword . '%')
            ->get();

        return view('employee.career-path-mgmt.searchCPD')->with('cpds', $cpds);
    }

    public function updateMeCPD($id)
    {
        //retrive submited form data

        $cpds = EmployeeCareerPathInfo::find($id);  //get the record based on product ID      

        $cpds->status = 'In Progress';
        $cpds->save(); //run the SQL update statment
        Session::flash('update', "Start the program successfull!");
        return redirect()->route('viewMeCPD');
    }

    public function updateMeCPDC($id)
    {
        //retrive submited form data
        $cpds = EmployeeCareerPathInfo::find($id);  //get the record based on product ID      

        $datenow = Carbon::now()->format('Y-m-d');
        $cpds->status = 'Completed';
        $cpds->scheduled_Date_Completed = $datenow;
        $cpds->save(); //run the SQL update statment
        Session::flash('update', "Congratulations! You've completed the program.");
        return redirect()->route('viewMeCPD');
    }
}
