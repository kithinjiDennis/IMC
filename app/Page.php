<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Page extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ar', 'meta_title_en', 'meta_title_ar', 'meta_desc_en', 'meta_desc_ar', 'meta_keyword_en' ,'meta_keyword_ar', 'slug', 
         'content_en', 'content_ar', 'status', 'created_at', 'updated_at'
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
