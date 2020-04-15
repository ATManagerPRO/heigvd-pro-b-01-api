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
        DB::table('todoList_user')->insert([
            'id' => 1,
            'todoList_id' => 3,
            'user_id' => 1,
            'permissionLevel' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
