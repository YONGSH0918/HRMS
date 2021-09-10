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
    'salary', 'start_Date', 'end_Date','emergency_Name', 
    'emergency_Contact_Number', 'document', 'status', 
    'employment_ID', 'marital_Status', 'salary_structure', 'leave_grade', 
    'employee_grade', 'epf_number','bank_Name', 'bank_account_number', 'workingSchedule'];

    public function administrator(){
        return $this->hasMany('App\Models\Administrator');
    }
    
    public function employeeCareerPathInfo(){
        return $this->hasMany('App\Models\EmployeeCareerPathInfo');
    }

    public function attendance(){
        return $this->hasMany('App\Models\Attendance');
    }

    public function vaccinationInfo(){
        return $this->hasMany('App\Models\VaccinationInfo');
    }

}
