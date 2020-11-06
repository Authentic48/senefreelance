<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function freelancer()
    {
        return $this->belongsTo('App\Freelancer');
    }
}
