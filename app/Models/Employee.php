<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_ID', 'ic', 'employee_Name', 'image', 'gender',
        'date_of_birth', 'race', 'national', 'country', 'state', 'city', 'address',
        'contact_Number', 'email', 'department', 'supervisor', 'jobtitle',
        'salary', 'start_Date', 'end_Date', 'emergency_Name',
        'emergency_Contact_Number', 'document', 'status',
        'employment_ID', 'marital_Status', 'leave_grade', 
        'epf_number', 'bank_Name', 'bank_account_number', 'workingSchedule'
    ];

    public function administrator()
    {
        return $this->hasMany('App\Models\Administrator');
    }

    public function employeeCareerPathInfo()
    {
        return $this->hasMany('App\Models\EmployeeCareerPathInfo');
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance');
    }

    public function vaccinationInfo()
    {
        return $this->hasMany('App\Models\VaccinationInfo');
    }

    public function bankName()
    {
        return $this->belongsTo('App\Models\Bankname');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function employement()
    {
        return $this->belongsTo('App\Models\Employment');
    }

    public function jobtitle()
    {
        return $this->belongsTo('App\Models\Jobtitle');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function workingTime()
    {
        return $this->belongsTo('App\Models\Workingtime');
    }
}
