<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['attendance_ID', 'employee_ID', 'employee_Name', 'department', 'date', 'time_In', 'time_Out', 'attendance_Status', 'signature', 'calendar_ID', 'total_Hours_Per_Day'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
