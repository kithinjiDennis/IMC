<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HealthTip extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'title_en', 'title_ar', 'subtitle_en', 'subtitle_ar', 'icon', 'description_en','description_ar','created_at','updated_at'
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
}
