<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Vacation',
            ],
            [
                'name' => 'Excursion',
            ],
            [
                'name' => 'Shopping',
            ]
        ];

        DB::table('types')->insert($types);
    }
}
