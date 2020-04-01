<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'id' => 1,
            'user_id' => 1,
            'interval_id' => 2,
            'quantity' => 2,
            'label' => 'Faire du sport',
            'endDate' => Carbon::create('2020', '07', '01'),
            'intervalValue' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
