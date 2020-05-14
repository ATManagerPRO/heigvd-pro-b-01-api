<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoList_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_list_user')->insert([
            'id' => 1,
            'todo_list_id' => 3,
            'user_id' => 1,
            'permissionLevel' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_list_user')->insert([
            'id' => 2,
            'todo_list_id' => 13,
            'user_id' => 1,
            'permissionLevel' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_list_user')->insert([
            'id' => 3,
            'todo_list_id' => 12,
            'user_id' => 1,
            'permissionLevel' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
