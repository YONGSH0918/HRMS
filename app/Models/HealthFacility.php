<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacility extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function vaccinationInfo()
    {
        return $this->hasMany('App\Models\VaccinationInfo');
    }
}
