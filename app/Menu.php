<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Menu extends Authenticatable
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name_en', 'name_ar', 'menu_type_id', 'page_id', 'order', 'status', 'created_at', 'updated_at'
    ];

    # function for relation with MenuType model
    public function MenuType() {
        return $this->hasOne(MenuType::class, 'id', 'menu_type_id');
    }

    # function for relation with SubMenu model
    public function getSubMenu() {
        return $this->hasMany(SubMenu::class, 'menu_id', 'id');
    }

    # function for relation with Pages model
    public function getPage() {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }
}
