<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('folders')->insert([
            'id' => 1,
            'user_id' => 1,
            'label' => 'My personal folder',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 2,
            'user_id' => 3,
            'label' => 'Life style',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 3,
            'user_id' => 4,
            'label' => 'Maison',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 4,
            'user_id' => 4,
            'label' => 'Ecole',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 5,
            'user_id' => 4,
            'label' => 'Administratif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 6,
            'user_id' => 4,
            'label' => 'Vacances',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('folders')->insert([
            'id' => 7,
            'user_id' => 4,
            'label' => 'Amis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
