<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    //
    protected $fillable=['jobtitle_name','department_id','rate_per_hour'];

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

    public function onlineapplicant() {
        return $this->hasMany('App\Models\OnlineApplicant');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
    
}
