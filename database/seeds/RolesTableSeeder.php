<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Client'
            ],
            [
                'name' => 'Manager'
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
