<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workingtime extends Model
{
    //
    protected $fillable=['start','end','duration'];

    public function employment(){
        return $this->belongsTo('App\Models\Employment');
    }
}
