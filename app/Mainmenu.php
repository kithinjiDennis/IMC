<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mainmenu extends Authenticatable
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'order', 'parent_id','title_en', 'title_ar', 'type', 'link', 'page_id', 'column_size', 'row_size','created_at','updated_at'
     ];
}
