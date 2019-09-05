<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Follow extends Authenticatable
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id','main_title_en','main_title_ar','description_en','description_ar','created_at','updated_at'
     ];
}
