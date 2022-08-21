<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Hash;
use Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'user'
        ]);
    }
}
