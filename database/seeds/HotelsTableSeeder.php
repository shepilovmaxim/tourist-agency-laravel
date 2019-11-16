<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = [
            [
                'name' => 'Laguna Garden',
                'stars' => 4,
                'image' => '1.jpg'
            ],
            [
                'name' => 'Monaco',
                'stars' => 3,
                'image' => '3.jpg'
            ],
            [
                'name' => 'Minoa Athens',
                'stars' => 3,
                'image' => '2.jpg'
            ],
            [
                'name' => 'Hilton Colon Guayaqu',
                'stars' => 5,
                'image' => '4.jpg'
            ]
        ];

        DB::table('hotels')->insert($hotels);
    }
}
