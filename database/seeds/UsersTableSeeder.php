<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'googleId' => Str::random(21),
            'email' => 'gollgot@gmail.com',
            'tokenAPI' => Str::random(env("AUTH_TOKEN_LENGTH")),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'googleId' => Str::random(21),
            'email' => 'sikiewz@gmail',
            'tokenAPI' => Str::random(env("AUTH_TOKEN_LENGTH")),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'googleId' => Str::random(21),
            'email' => 'chucknorris@gmail.com',
            'tokenAPI' => Str::random(env("AUTH_TOKEN_LENGTH")),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'googleId' => '111110858215912685956',
            'email' => 'chaukot.dev@gmail.com',
            'tokenAPI' => '4a420c1b49e0e3352ef8f0de6da1249f',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
