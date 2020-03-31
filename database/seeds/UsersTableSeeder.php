<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'googleToken' => Str::random(50),
            'pseudo' => 'gollgot',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'googleToken' => Str::random(50),
            'pseudo' => 'sikiewz',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'googleToken' => Str::random(50),
            'pseudo' => 'chucknorris',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
