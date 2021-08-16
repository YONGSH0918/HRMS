<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;
    protected $fillable=['jobtitle_Name','workschedule_Name'];

    public function JobTitle(){
        return $this->belongsTo('App\Models\JobTitle');
    }
    
}
