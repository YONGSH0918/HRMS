<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function jobtitle() {
        return $this->hasMany('App\Models\Jobtitle');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
