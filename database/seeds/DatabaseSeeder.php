<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FoldersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TodoListsTableSeeder::class);
        $this->call(TodoList_UserTableSeeder::class);
        $this->call(IntervalTableSeeder::class);
        $this->call(TodosTableSeeder::class);
        $this->call(Tag_TodoTableSeeder::class);
    }
}
