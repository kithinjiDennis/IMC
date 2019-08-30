<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Topmenu extends Authenticatable
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_ar', 'order', 'type', 'link', 'icon','page_id','created_at','updated_at'
     ];
}
