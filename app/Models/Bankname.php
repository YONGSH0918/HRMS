<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankname extends Model
{
    //
    protected $fillable = ['name'];

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
