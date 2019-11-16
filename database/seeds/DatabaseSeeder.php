<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HotelsTableSeeder::class,
            TypesTableSeeder::class,
            RolesTableSeeder::class,
            StatusesTableSeeder::class,
            ToursTableSeeder::class,
            UsersTableSeeder::class,
            VouchersTableSeeder::class,
        ]);
    }
}
