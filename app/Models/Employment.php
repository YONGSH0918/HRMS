<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    //
    protected $fillable=['employment_name','workingtime_id'];

    public function workingtime(){
        return $this->hasMany('App\Models\Workingtime');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
