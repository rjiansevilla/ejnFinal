<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::where('name', 'superadministrator')->first();
        
        $user = \App\User::create([
                "name" => "Ideyasweb Business",
                "fname" => "Ideyasweb",
                "lname" => "Business",
                "email" => "info@ideyasweb.com",
                "password" => Hash::make('password'),
            ]);

        $user->attachRole($role);
    }
}
