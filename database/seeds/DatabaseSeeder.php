<?php

use App\Folder;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $USER_NB = 5;
    private $FOLDER_NB = 1;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, $this->USER_NB)->create();
        $users->each(function($user){
            factory(Folder::class, $this->FOLDER_NB)->create(['user_id' => $user->id]);
        });
    }
}
