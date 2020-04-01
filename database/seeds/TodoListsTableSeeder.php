<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->insert([
            'id' => 1,
            'user_id' => 1,
            'folder_id' => 1,
            'title' => 'School work list',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 2,
            'user_id' => 3,
            'folder_id' => 2,
            'title' => 'Fitness list',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 3,
            'user_id' => 2,
            'folder_id' => null,
            'title' => 'Games',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 4,
            'user_id' => 1,
            'folder_id' => null,
            'title' => 'Autres',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
