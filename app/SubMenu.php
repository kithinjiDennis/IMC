<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SubMenu extends Authenticatable
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'name_en', 'name_ar', 'page_id', 'status', 'created_at', 'updated_at'
    ];

    # function for relation with Menu model
    public function ParentMenu() {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    # function for relation with Page model
    public function getPage() {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }
}
