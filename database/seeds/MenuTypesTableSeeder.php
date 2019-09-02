<?php

use Illuminate\Database\Seeder;
use App\MenuType;

class MenuTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles[0]['name'] = 'header';
        $roles[0]['created_at'] = time();
        $roles[0]['updated_at'] = time();


        $roles[1]['name'] = 'footer';
        $roles[1]['created_at'] = time();
        $roles[1]['updated_at'] = time();
        
        MenuType::insert($roles);
    }
}
