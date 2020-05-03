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

        DB::table('goals')->insert([
            'id' => 2,
            'user_id' => 1,
            'interval_id' => 2,
            'quantity' => 10,
            'label' => 'Boire de l\'eau',
            'endDate' => Carbon::create('2020', '07', '01'),
            'intervalValue' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goals')->insert([
            'id' => 3,
            'user_id' => 4,
            'interval_id' => 2,
            'quantity' => 20,
            'label' => 'Longueur 50m à la nage',
            'endDate' => Carbon::create('2020', '12', '30'),
            'intervalValue' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('goals')->insert([
            'id' => 4,
            'user_id' => 4,
            'interval_id' => 4,
            'quantity' => 1,
            'label' => 'Sortie à vélo de 50km',
            'endDate' => Carbon::create('2020', '10', '20'),
            'intervalValue' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
