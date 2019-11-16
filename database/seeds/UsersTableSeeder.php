<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [ 
                'login' => 'admin',
                'firstName' => 'admin',
                'lastName' => 'admin',
                'phoneNumber' => '0951488228',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role_id' => 1 
            ],
            [
                'login' => 'client',
                'firstName' => 'client',
                'lastName' => 'client',
                'phoneNumber' => '0663228228',
                'email' => 'client@gmail.com',
                'password' => Hash::make('client'),
                'role_id' => 11 
            ],
            [
                'login' => 'manager',
                'firstName' => 'manager',
                'lastName' => 'manager',
                'phoneNumber' => '0503228228',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('manager'),
                'role_id' => 21 
            ],
        ];

        DB::table('users')->insert($users);
    }
}
