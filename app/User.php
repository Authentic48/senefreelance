<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Sends the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPassword($token));
    }
}

class CustomPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Nous envoyons cet e-mail car nous avons reçu une demande de mot de passe oublié.')
            ->action('réinitialiser votre mot de passe', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line("Si vous n'avez pas demandé de réinitialisation de mot de passe, aucune autre action n'est requise. Veuillez nous contacter si vous n'avez pas soumis cette demande");
    }
}
