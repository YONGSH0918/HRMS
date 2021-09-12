<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable=['department_name'];

    public function jobtitle(){
        return $this->hasMany('App\Models\Jobtitle');
    }
}
