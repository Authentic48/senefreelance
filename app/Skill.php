<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = [];

    public function freelancer()
    {
        return $this->belongsTo('App\Freelancer');
    }

    
}
