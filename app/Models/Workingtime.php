<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workingtime extends Model
{
    //
    protected $fillable=['start','end'];

    public function employment(){
        return $this->belongsTo('App\Models\Employment');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
