<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_Vaccination_ID', 'employee_ID', 'employee_IC',
        'employee_Name', 'vaccine_Type', 'health_Facility', 'vaccination_Location', 'vaccination_Date', 'vaccination_Time', 'vaccination_Status'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function healthFacility()
    {
        return $this->belongsTo('App\Models\HealthFacility');
    }
}
