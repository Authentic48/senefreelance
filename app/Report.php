<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    public function freelancer()
    {
        return $this->belongsTo('App\Freelancer');
    }
}
