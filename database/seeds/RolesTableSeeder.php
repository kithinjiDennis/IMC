<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles[0]['name'] = 'admin';
        $roles[0]['created_at'] = time();
        $roles[0]['updated_at'] = time();


        $roles[1]['name'] = 'sub_admin';
        $roles[1]['created_at'] = time();
        $roles[1]['updated_at'] = time();
        
        Role::insert($roles);
    }
}
