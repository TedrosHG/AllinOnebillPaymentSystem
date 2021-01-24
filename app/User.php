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
        'name', 'email', 'password','phone','service_id','image',
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

    public function service(){
        return $this->belongsTo('App\Service');
    }
    public function bank(){
        return $this->hasOne('App\Bank');
    }
    public function register(){
        return $this->hasMany('App\Register');
    }
    public function history(){
        return $this->hasMany('App\History');
    }
    public function sms(){
        return $this->hasMany('App\Sms');
    }
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}