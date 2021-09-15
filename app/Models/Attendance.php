<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['attendance_ID', 'employee_ID', 'date', 'time_In', 'time_Out'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
