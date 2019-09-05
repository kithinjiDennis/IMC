<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Section extends Authenticatable
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id','name','is_enable'
     ];
}
