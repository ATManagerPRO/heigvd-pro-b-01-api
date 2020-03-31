<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    }
}
