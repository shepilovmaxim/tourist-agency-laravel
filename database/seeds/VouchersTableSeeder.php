<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VouchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vouchers = [
            [
                'user_id' => 3,
                'status_id' => 2,
                'tour_id' => 2
            ],
            [
                'user_id' => 2,
                'status_id' => 3,
                'tour_id' => 1
            ],
            [
                'user_id' => 2,
                'status_id' => 3,
                'tour_id' => 2
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'tour_id' => 3
            ]
        ];

        DB::table('vouchers')->insert($vouchers);
    }
}
