<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //addEmployee
    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $images=$r->file('employees-image');   //step to upload image get the file input
        $images->move('images',$images->getClientOriginalName());   //images is the location                
        $imagesName=$images->getClientOriginalName(); 

        $document=$r->file('employees-document');   //step to upload image get the file input
        $document->move('document',$document->getClientOriginalName());   //images is the location                
        $documentName=$document->getClientOriginalName(); 

        $addEmployee=Employee::create([    //step 3 bind data
            'employee_ID'=>$r->employee_ID, //add on 
            'ic'=>$r->ic, //ic -> IC
            'employee_Name'=>$r->employee_Name,
            'images'=>$r->imagesName,
            'gender'=>$r->gender,
            'date_of_birth'=>$r->date_of_birth,
            'race'=>$r->race,
            'country'=>$r->country,
            'national'=>$r->national,
            'address'=>$r->address,
            'contact_Number'=>$r->contact_Number,
            'email'=>$r->email,
            'department'=>$r->department,
            'jobtitle'=>$r->jobtitle,
            'salary'=>$r->salary,
            'start_Date'=>$r->start_Date,
            'end_Date'=>$r->end_Date,
            'education'=>$r->education,
            'work_Experience'=>$r->work_Experience,
            'emergency_Name'=>$r->emergency_Name,
            'emergency_Contact_Number'=>$r->emergency_Contact_Number,
            'document'=>$r->documentName,
            'calendar_ID'=>$r->calendar_ID,
            'employment_ID'=>$r->employment_ID,
            'marital_Status'=>$r->marital_Status,
            'salary_structure'=>$r->salary_structure,
            'leave_grade'=>$r->leave_grade,
            'employee_grade'=>$r->employee_grade,
            'epf_number'=>$r->epf_number,
            'bank_Name'=>$r->bank_Name,          
            'bank_account_number'=>$r->bank_account_number,
            'workingSchedule'=>$r->workingSchedule, 
            
        ]);


        Session::flash('success',"Add New Employee Succesful!");

        return redirect()->route('viewEmployee');
    }

    public function viewEmployee(){
        $employees=Employee::paginate(15);
        
        return view('viewEmployee')->with('employees',$employees);
    }
}
