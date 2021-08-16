<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['employee_ID', 'ic', 'employee_Name', 'image', 'gender', 
    'date_of_birth', 'race', 'country','national', 'address', 
    'contact_Number', 'email', 'department', 'jobtitle', 
    'salary', 'start_Date', 'end_Date','education', 'work_Experience','emergency_Name', 
    'emergency_Contact_Number', 'document', 'calendar_ID', 
    'employment_ID', 'marital_Status', 'salary_structure', 'leave_grade', 
    'employee_grade', 'epf_number','bank_Name', 'bank_account_number', 'workingSchedule'];

    public function Administrator(){
        return $this->hasMany('App\Models\Administrator');
    }
    
    public function EmployeeCareerPathInfo(){
        return $this->hasMany('App\Models\EmployeeCareerPathInfo');
    }

    public function Attendance(){
        return $this->hasMany('App\Models\Attendance');
    }

    public function VaccinationInfo(){
        return $this->hasMany('App\Models\VaccinationInfo');
    }

}
