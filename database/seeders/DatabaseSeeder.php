<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Str;
use Hash;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AdminsSeeder::class,
            BloggersSeeder::class,
            BlogsSeeder::class

        ]);
    }
}
