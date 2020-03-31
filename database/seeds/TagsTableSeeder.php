<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'id' => 1,
            'user_id' => 3,
            'label' => 'Healthy',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'user_id' => 1,
            'label' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'user_id' => 1,
            'label' => 'School',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
