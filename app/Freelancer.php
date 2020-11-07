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
    return ['freelancer_ref' => 'ref', 'freelancer_category' =>'category', 'freelancer_region' => 'region'];
  }

  public function skills()
  {
    return $this->hasMany('App\Skill');
  }

  public function experiences()
  {
    return $this->hasMany('App\Experience');
  }

  public function educations()
  {
    return $this->hasMany('App\Education');
  }

  public function reports()
  {
    return $this->hasMany('App\Report');
  }

  public function reviews()
  {
    return $this->hasMany('App\Review');
  }
  
}
