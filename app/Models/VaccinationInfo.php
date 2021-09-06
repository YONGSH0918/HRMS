<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationInfo extends Model
{
    use HasFactory;
    protected $fillable=['employee_Vaccination_ID', 'employee_ID', 'employee_IC',
    'employee_Name', 'vaccine_Type', 'vaccination_Location', 'vaccination_DateTime', 'vaccination_Status'];

    public function employeeVaccination(){
        return $this->belongsTo('App\Models\EmployeeVaccination');
    }
}
