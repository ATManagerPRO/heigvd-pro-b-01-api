<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tag_TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_todo')->insert([
            'id' => 1,
            'tag_id' => 4,
            'todo_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tag_todo')->insert([
            'id' => 2,
            'tag_id' => 4,
            'todo_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tag_todo')->insert([
            'id' => 3,
            'tag_id' => 1,
            'todo_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tag_todo')->insert([
            'id' => 4,
            'tag_id' => 3,
            'todo_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
