<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Contact extends Authenticatable
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id','main_title_en','main_title_ar','phone','email','address','time','created_at','updated_at'
     ];
}
