<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Goal_TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goal_todos')->insert([
            'id' => 1,
            'goal_id' => 1,
            'quantityDone' => null,
            'dateTimeDone' => null,
            'dueDate' => Carbon::create('2020', '04', '30', '21', '30', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 2,
            'goal_id' => 2,
            'quantityDone' => 10,
            'dateTimeDone' => Carbon::create('2020', '04', '30'),
            'dueDate' => Carbon::create('2020', '04', '30', '19', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 3,
            'goal_id' => 3,
            'quantityDone' => 10,
            'dateTimeDone' => Carbon::create('2020', '04', '19'),
            'dueDate' => Carbon::create('2020', '04', '19', '11', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 4,
            'goal_id' => 3,
            'quantityDone' => 15,
            'dateTimeDone' => Carbon::create('2020', '04', '26'),
            'dueDate' => Carbon::create('2020', '04', '26', '11', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 5,
            'goal_id' => 3,
            'quantityDone' => 20,
            'dateTimeDone' => Carbon::create('2020', '05', '03'),
            'dueDate' => Carbon::create('2020', '05', '03', '11', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 6,
            'goal_id' => 3,
            'quantityDone' => null,
            'dateTimeDone' => null,
            'dueDate' => Carbon::create('2020', '05', '10', '11', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 7,
            'goal_id' => 4,
            'quantityDone' => 1,
            'dateTimeDone' => Carbon::create('2020', '05', '02', '16', '00', '00'),
            'dueDate' => Carbon::create('2020', '05', '02', '16', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 8,
            'goal_id' => 4,
            'quantityDone' => null,
            'dateTimeDone' => null,
            'dueDate' => Carbon::create('2020', '05', '23', '16', '00', '00'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
