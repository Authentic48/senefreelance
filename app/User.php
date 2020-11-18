<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
       return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function freelancer()
    {
        return $this->hasOne('App\Freelancer');
    }

    public function hasFreelancerAccount($user_id)
    {
        return null !== $this->freelancer()->where('user_id', $user_id)->first();
    }

    public function getRouteKeyName()
    {
        return 'ref';
    }

    /**
      * Send the password reset notification.
      *
      * @param  string  $token
      * @return void
      */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    /**
      * Send the email verification notification.
      *
      * @return void
    */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); 
    }
}

