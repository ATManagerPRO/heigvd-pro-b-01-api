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
            'dueDate' => Carbon::create('2020', '04', '30'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goal_todos')->insert([
            'id' => 2,
            'goal_id' => 2,
            'quantityDone' => 10,
            'dateTimeDone' => Carbon::create('2020', '04', '30'),
            'dueDate' => Carbon::create('2020', '04', '30'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
