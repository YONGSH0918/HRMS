<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCareerPathInfo extends Model
{
    use HasFactory;

    protected $fillable=['employee_CareerPath_Info_ID', 'employee_ID', 'employee_Name', 'supervisor_Name', 'current_JobTitle', 
    'program_Title', 'program_Desc','periodPlan_From', 'periodPlan_To', 'tranningOrCourse_Name', 'scheduled_Date_Completed'];

    public function Employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
