<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BottomFooter extends Authenticatable
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'page_id','copyright','created_at','updated_at'
     ];
}
