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
                'user_id' => 21,
                'status_id' => 11,
                'tour_id' => 11
            ],
            [
                'user_id' => 11,
                'status_id' => 21,
                'tour_id' => 1
            ],
            [
                'user_id' => 11,
                'status_id' => 21,
                'tour_id' => 11
            ],
            [
                'user_id' => 11,
                'status_id' => 1,
                'tour_id' => 21
            ]
        ];

        DB::table('vouchers')->insert($vouchers);
    }
}
