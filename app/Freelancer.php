<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
      return 'ref';
    }

    public function skills()
    {
      return $this->hasMany('App\Skill');
    }

}
