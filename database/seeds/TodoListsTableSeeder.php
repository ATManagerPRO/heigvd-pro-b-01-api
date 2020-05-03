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

        DB::table('todo_lists')->insert([
            'id' => 5,
            'user_id' => 4,
            'folder_id' => 5,
            'title' => 'Facture',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 6,
            'user_id' => 4,
            'folder_id' => 5,
            'title' => 'Déménagement',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 7,
            'user_id' => 4,
            'folder_id' => 4,
            'title' => 'POO2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 8,
            'user_id' => 4,
            'folder_id' => 4,
            'title' => 'GEN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 9,
            'user_id' => 4,
            'folder_id' => null,
            'title' => 'A cuisiner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 10,
            'user_id' => 4,
            'folder_id' => 3,
            'title' => 'Menage',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 11,
            'user_id' => 4,
            'folder_id' => 6,
            'title' => 'Quoi prendre vacance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 12,
            'user_id' => 4,
            'folder_id' => 6,
            'title' => 'Réservation vacance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 13,
            'user_id' => 4,
            'folder_id' => 3,
            'title' => 'Remplir frigo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 14,
            'user_id' => 4,
            'folder_id' => null,
            'title' => 'Jeux-videos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todo_lists')->insert([
            'id' => 15,
            'user_id' => 4,
            'folder_id' => null,
            'title' => 'Musique',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
