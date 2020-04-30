<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'id' => 1,
            'todo_list_id' => 3,
            'user_id' => 1, // Whose assigned
            'interval_id' => null,
            'title' => 'Test des battle royal disponibles',
            'details' => 'Tester tous les battle royal disponibles et faire un classement du pire au meilleur.',
            'dueDate' => Carbon::create('2020', '04', '30'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 2,
            'todo_list_id' => 3,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Préparer live twitch',
            'details' => 'Préparer tout ce qu il faut pour setup un live twitch.',
            'dueDate' => Carbon::create('2020', '04', '30'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 3,
            'todo_list_id' => 2,
            'user_id' => null, // Whose assigned
            'interval_id' => 2,
            'title' => 'Jour des jambes',
            'details' => 'Barbell squat, Leg press, Leg extensions',
            'dueDate' => Carbon::create('2020', '04', '30'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => Carbon::create('2020', '05', '17'),
            'favorite' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 4,
            'todo_list_id' => 1,
            'user_id' => null, // Whose assigned
            'interval_id' => 1,
            'title' => 'Devoir',
            'details' => 'Faire mes devoirs comme le bon élève que je suis',
            'dueDate' => Carbon::create('2020', '04', '30'),
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => 1,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todos')->insert([
            'id' => 5,
            'todo_list_id' => 4,
            'user_id' => null, // Whose assigned
            'interval_id' => null,
            'title' => 'Faire les cours',
            'details' => 'Prendre du lait et du chocolat',
            'dueDate' => null,
            'dateTimeDone' => null,
            'reminderDateTime' => null,
            'intervalValue' => null,
            'intervalEndDate' => null,
            'favorite' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
