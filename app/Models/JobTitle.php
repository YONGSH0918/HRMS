<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable=['department_ID','jobtitle_Name','jobtitle_Desc'];

    public function Department(){
        return $this->belongsTo('App\Models\Department');
    }

    public function WorkingSchedule(){
        return $this->hasMany('App\Models\WorkingSchedule');
    }
}
