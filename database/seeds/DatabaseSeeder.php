<?php

use App\Folder;
use App\Todo;
use App\TodoList;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    private $USER_NB = 5;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 5 users
        $users = factory(User::class, $this->USER_NB)->create();

        // For each user
        $users->each(function($user){

            // Create 1 folder
            $folders = factory(Folder::class, 1)->create([
                'user_id' => $user->id
            ]);

            // Create 1 todolist
            $todoLists = factory(TodoList::class, 1)->create([
                'user_id' => $user->id,
                'folder_id' => $folders[0]->id
            ]);

            // Associate the todoList to the user
            DB::table('todoList_user')->insert(
                [
                    'todoList_id' => $todoLists[0]->id,
                    'user_id' => $user->id,
                    'permissionLevel' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

        });
    }
}
