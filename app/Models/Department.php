<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=['department_ID','department_Name', 'department_Desc'];

    public function JobTitle(){
        return $this->hasMany('App\Models\JobTitle');
    }

}
