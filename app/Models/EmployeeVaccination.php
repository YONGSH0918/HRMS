<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeVaccination extends Model
{
    use HasFactory;

    protected $fillable=['employee_Vaccination_ID','employee_ID','employee_Name', 'employee_Department', 'vaccination_Status'];

    public function VaccinationInfo(){
        return $this->hasMany('App\Models\VaccinationInfo');
    }

    public function Employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
