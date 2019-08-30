<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Middlemenu extends Authenticatable
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'type','order','icon', 'link','created_at','updated_at'
     ];
}
