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
            'dueDate' => Carbon::create('2020', '05', '01'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
