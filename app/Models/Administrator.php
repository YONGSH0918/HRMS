<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    protected $fillable=['admin_ID', 'admin_Name', 'password', 'employee_ID', 'calendar_ID'];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
