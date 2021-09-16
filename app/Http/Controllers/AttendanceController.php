<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;
use App\Models\User;
use App\Models\Employee;
use App\Models\Employment;
use App\Models\Attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function addA($id)
    {
        $employees = Employee::all()->where('id', $id);

        return view('admin.attendance-mgmt.addAttendance')
            ->with('employees', $employees);
    }

    public function storeA()
    {    //step 2 
        $r = request(); //step 3 get data from HTML


        $addAttendance = Attendance::create([    //step 3 bind data
            //add on 
            'employee_ID' => $r->employee_ID, //id
            'date' => $r->date, //id
            'time_In' => $r->time_In,
            'time_Out' => $r->time_Out,

        ]);


        Session::flash('success', "Add Attendance Succesful!");

        return redirect()->route('viewA');
    }

    //show employee
    public function show()
    {

        $employees = Employee::all();

        return view('admin.attendance-mgmt.index')->with('employees', $employees);
    }

    public function showA()
    {

        $attendances = Attendance::all();

        return view('admin.attendance-mgmt.indexA')->with('attendances', $attendances);
    }

    //find employee to edit
    public function editA($id)
    {

        $attendances = Attendance::all()->where('id', $id);

        return view('admin.attendance-mgmt.edit')
            ->with('attendances', $attendances);
    }

    public function delete($id)
    {
        $attendances = Attendance::find($id);
        $attendances->delete();

        Session::flash('delete', "Attendance Deleted Succesful!");
        return redirect()->route('viewA');
    }

    //edit
    public function updateA()
    {
        $r = request(); //retrive submited form data
        $attendances = Attendance::find($r->ID);  //get the record based on product ID      

        $attendances->employee_ID = $r->employee_ID;
        $attendances->date = $r->date;
        $attendances->time_In = $r->time_In;
        $attendances->time_Out = $r->time_Out;
        $attendances->save(); //run the SQL update statment
        Session::flash('update', "Attendance Updated Succesful!");
        return redirect()->route('viewA');
    }

    //search employee
    function searchA()
    {
        $request = request();
        $keyword = $request->search;
        $attendances = DB::table('attendances')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('date', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.attendance-mgmt.searchA')->with('attendances', $attendances);
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $employees = DB::table('employees')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('department', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.attendance-mgmt.search')->with('employees', $employees);
    }

    //-----------------------------------------------------------------------//

    public function storeMeA()

    {    //step 2 

        $r = request();

        $addAttendance = Attendance::create([    //step 3 bind data
            //add on 
            'employee_ID' => Auth::id(), //id
            'date' => $r->date, //id
            'time_In' => $r->time_In,
            'time_Out' => '00:00:00',

        ]);


        Session::flash('success', "Take Attendance Succesful!");

        return redirect()->route('viewMeA');
    }

    public function showMeA()
    {

        $attendances = Attendance::all()->where('employee_ID', Auth::id());;
        $employees = Employee::all();
        $employments = Employment::all();

        return view('employee.attendance-mgmt.indexA')
        ->with('employees', $employees)
        ->with('employments', $employments)
        ->with('attendances', $attendances);
    }

    public function updateMeA($id)
    {
        //retrive submited form data
        $attendances = Attendance::find($id);  //get the record based on product ID      


        $attendances->time_Out = Carbon::now();
        $attendances->save(); //run the SQL update statment
        Session::flash('update', "Time Out Succesful! Bye Bye.");
        return redirect()->route('viewMeA');
    }

    //search employee
    function searchMeA()
    {
        $request = request();
        $keyword = $request->search;
        $attendances = DB::table('attendances')
            ->where('date', 'like', '%' . $keyword . '%')
            ->get();

        return view('employee.attendance-mgmt.searchA')->with('attendances', $attendances);
    }
}
