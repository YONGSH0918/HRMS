<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class OnlineApplicant extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name','ic','dob','gender','marital_status',
        'race','religion','nationality','email','phone_num',
        'address','city','state','country',
        'position_applied', 'expected_salary','document',
        'image','emergency_contact_name','emergency_contact_number'];

    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function city() {
        return $this->belongsTo('App\Models\City');
    }

    public function state() {
        return $this->belongsTo('App\Models\State');
    }

    public function jobtitle() {
        return $this->belongsTo('App\Models\Jobtitle');
    }
}
