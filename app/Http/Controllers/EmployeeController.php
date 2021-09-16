<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Bankname;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employment;
use App\Models\Position;
use App\Models\Nationality;
use App\Models\State;
use App\Models\Workingtime;
use App\Models\EmployeeCareerPathInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class EmployeeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    //turn page
    public function add()
    {

        $banknames = Bankname::all();
        $cities = City::all();
        $countries = Country::all();
        $departments = Department::all();
        $employments = Employment::all();
        $positions = Position::all();
        $nationalities = Nationality::all();
        $states = State::all();
        $workingtimes = Workingtime::all();
        $supervisors = Employee::all();

        return view('admin.employees-mgmt.addEmployee')
        ->with('banknames', $banknames)
        ->with('cities', $cities)
        ->with('countries', $countries)
        ->with('departments', $departments)
        ->with('employments', $employments)
        ->with('positions', $positions)
        ->with('nationalities', $nationalities)
        ->with('states', $states)
        ->with('supervisors', $supervisors)
        ->with('workingtimes', $workingtimes)
        ->with('supervisors', $supervisors);
    }

    public function findWorkingSchedule(Request $request)
    {
        $employments = Employment::select('workingtime_id')->where('id', $request->id)->first();

        return response()->json($employments);
    }



    //addEmployee
    public function store()
    {    //step 2 
        $r = request(); //step 3 get data from HTML
        $image = $r->file('employees-image');   //step to upload image get the file input
        $image->move('images/employeesImages', $image->getClientOriginalName());   //images is the location                
        $imageName = $image->getClientOriginalName();

        $document = $r->file('employees-document');   //step to upload document get the file input
        $document->move('documents', $document->getClientOriginalName());   //document is the location                
        $documentName = $document->getClientOriginalName();

        $addEmployee = Employee::create([    //step 3 bind data
            'employee_ID' => $r->employee_ID, //add on 
            'ic' => $r->ic, //ic -> IC
            'employee_Name' => $r->employee_Name,
            'image' => $imageName,
            'gender' => $r->gender,
            'date_of_birth' => $r->date_of_birth,
            'race' => $r->race,
            'national' => $r->national,
            'country' => $r->country,
            'state' => $r->state,
            'city' => $r->city,
            'address' => $r->address,
            'contact_Number' => $r->contact_Number,
            'email' => $r->email,
            'department' => $r->department,
            'supervisor' => $r->supervisor,
            'jobtitle' => $r->jobtitle,
            'salary' => $r->salary,
            'start_Date' => $r->start_Date,
            'end_Date' => $r->end_Date,
            'emergency_Name' => $r->emergency_Name,
            'emergency_Contact_Number' => $r->emergency_Contact_Number,
            'document' => $documentName,
            'status' => $r->status,
            'employment_ID' => $r->employment_ID,
            'marital_Status' => $r->marital_Status,
            'salary_structure' => $r->salary_structure,
            'leave_grade' => $r->leave_grade,
            'employee_grade' => $r->employee_grade,
            'epf_number' => $r->epf_number,
            'bank_Name' => $r->bank_Name,
            'bank_account_number' => $r->bank_account_number,
            'workingSchedule' => $r->workingSchedule,

        ]);


        Session::flash('success', "Add New Employee Succesful!");

        return redirect()->route('viewEmployee');
    }

    //show employee
    public function show()
    {

        $employees = Employee::all();

        return view('admin.employees-mgmt.index')->with('employees', $employees);
    }

    //find employee to edit
    public function edit($id)
    {

        $employees = Employee::all()->where('id', $id); 
        $banknames = Bankname::all();
        $cities = City::all();
        $countries = Country::all();
        $departments = Department::all();
        $employments = Employment::all();
        $positions = Position ::all();
        $nationalities = Nationality::all();
        $states = State::all();
        $workingtimes = Workingtime::all();
        $supervisors = Employee::all();
        

        return view('admin.employees-mgmt.edit')->with('employees', $employees)
        ->with('banknames', $banknames)
        ->with('cities', $cities)
        ->with('countries', $countries)
        ->with('departments', $departments)
        ->with('employments', $employments)
        ->with('positions', $positions)
        ->with('nationalities', $nationalities)
        ->with('states', $states)
        ->with('supervisors', $supervisors)
        ->with('workingtimes', $workingtimes)
        ->with('supervisors', $supervisors);
    }

    //edit
    public function update()
    {
        $r = request(); //retrive submited form data
        $employees = Employee::find($r->ID);  //get the record based on product ID      
        if ($r->file('employees-image') != '') {
            $image = $r->file('employees-image');
            $image->move('images/employeesImages', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
            $employees->image = $imageName;
        }
        if ($r->file('employees-document') != '') {
            $document = $r->file('employees-document');
            $document->move('documents', $document->getClientOriginalName());
            $documentName = $document->getClientOriginalName();
            $employees->document = $documentName;
        }

        $employees->employee_ID = $r->employee_ID;
        $employees->ic = $r->ic;
        $employees->employee_Name = $r->employee_Name;
        $employees->gender = $r->gender;
        $employees->date_of_birth = $r->date_of_birth;
        $employees->race = $r->race;
        $employees->national = $r->national;
        $employees->country = $r->country;
        $employees->state = $r->state;
        $employees->city = $r->city;
        $employees->address = $r->address;
        $employees->contact_Number = $r->contact_Number;
        $employees->email = $r->email;
        $employees->department = $r->department;
        $employees->supervisor = $r->supervisor;
        $employees->jobtitle = $r->jobtitle;
        $employees->salary = $r->salary;
        $employees->start_Date = $r->start_Date;
        $employees->end_Date = $r->end_Date;
        $employees->emergency_Name = $r->emergency_Name;
        $employees->emergency_Contact_Number = $r->emergency_Contact_Number;
        $employees->status = $r->status;
        $employees->employment_ID = $r->employment_ID;
        $employees->marital_Status = $r->marital_Status;
        $employees->salary_structure = $r->salary_structure;
        $employees->leave_grade = $r->leave_grade;
        $employees->employee_grade = $r->employee_grade;
        $employees->epf_number = $r->epf_number;
        $employees->bank_Name = $r->bank_Name;
        $employees->bank_account_number = $r->bank_account_number;
        $employees->workingSchedule = $r->workingSchedule;
        $employees->save(); //run the SQL update statment
        Session::flash('update', "Employee updated Succesful!");
        return redirect()->route('viewEmployee');
    }

    //search employee
    function search()
    {
        $request = request();
        $keyword = $request->search;
        $employees = DB::table('employees')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('department', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.employees-mgmt.search')->with('employees', $employees);
    }


    public function showEmployeeDetail($id)
    {

        $employees = Employee::all()->where('id', $id);
        $employments = Employment::all();
        //select * from products where id='$id'

        return view('admin.employees-mgmt.profileEmployee')
        ->with('employments', $employments)
        ->with('employees', $employees);
    }

    //----------------------------------------------------------------------------//

    public function showMe()
    {

        $employees = Employee::all()->where('employee_ID', Auth::id() );

        return view('employee.employees-mgmt.index')->with('employees', $employees);
    }

    public function showMeDetail($id)
    {

        $employees = Employee::all()->where('id', $id);
        $employments = Employment::all();
        //select * from products where id='$id'

        return view('employee.employees-mgmt.profileEmployee')
        ->with('employments', $employments)
        ->with('employees', $employees);
    }

    public function editMe($id)
    {

        $employees = Employee::all()->where('id', $id); 
        $banknames = Bankname::all();
        $cities = City::all();
        $countries = Country::all();
        $departments = Department::all();
        $employments = Employment::all();
        $positions = Position ::all();
        $nationalities = Nationality::all();
        $states = State::all();
        $workingtimes = Workingtime::all();
        $supervisors = Employee::all();
        

        return view('employee.employees-mgmt.edit')->with('employees', $employees)
        ->with('banknames', $banknames)
        ->with('cities', $cities)
        ->with('countries', $countries)
        ->with('departments', $departments)
        ->with('employments', $employments)
        ->with('positions', $positions)
        ->with('nationalities', $nationalities)
        ->with('states', $states)
        ->with('supervisors', $supervisors)
        ->with('workingtimes', $workingtimes)
        ->with('supervisors', $supervisors);
    }

    //edit
    public function updateMe()
    {
        $r = request(); //retrive submited form data
        $employees = Employee::find($r->ID);  //get the record based on product ID      
        if ($r->file('employees-image') != '') {
            $image = $r->file('employees-image');
            $image->move('images/employeesImages', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
            $employees->image = $imageName;
        }
        if ($r->file('employees-document') != '') {
            $document = $r->file('employees-document');
            $document->move('documents', $document->getClientOriginalName());
            $documentName = $document->getClientOriginalName();
            $employees->document = $documentName;
        }

        $employees->employee_ID = $r->employee_ID;
        $employees->ic = $r->ic;
        $employees->employee_Name = $r->employee_Name;
        $employees->gender = $r->gender;
        $employees->date_of_birth = $r->date_of_birth;
        $employees->race = $r->race;
        $employees->national = $r->national;
        $employees->country = $r->country;
        $employees->state = $r->state;
        $employees->city = $r->city;
        $employees->address = $r->address;
        $employees->contact_Number = $r->contact_Number;
        $employees->email = $r->email;
        $employees->department = $r->department;
        $employees->supervisor = $r->supervisor;
        $employees->jobtitle = $r->jobtitle;
        $employees->salary = $r->salary;
        $employees->start_Date = $r->start_Date;
        $employees->end_Date = $r->end_Date;
        $employees->emergency_Name = $r->emergency_Name;
        $employees->emergency_Contact_Number = $r->emergency_Contact_Number;
        $employees->status = $r->status;
        $employees->employment_ID = $r->employment_ID;
        $employees->marital_Status = $r->marital_Status;
        $employees->salary_structure = $r->salary_structure;
        $employees->leave_grade = $r->leave_grade;
        $employees->employee_grade = $r->employee_grade;
        $employees->epf_number = $r->epf_number;
        $employees->bank_Name = $r->bank_Name;
        $employees->bank_account_number = $r->bank_account_number;
        $employees->workingSchedule = $r->workingSchedule;
        $employees->save(); //run the SQL update statment
        Session::flash('update', "Updated Succesful!");
        return redirect()->route('viewMe');
    }
}
