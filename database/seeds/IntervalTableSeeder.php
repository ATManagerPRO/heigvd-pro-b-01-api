<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intervals')->insert([
            'id' => 1,
            'label' => "day",
        ]);

        DB::table('intervals')->insert([
            'id' => 2,
            'label' => "week",
        ]);

        DB::table('intervals')->insert([
            'id' => 3,
            'label' => "month",
        ]);

        DB::table('intervals')->insert([
            'id' => 4,
            'label' => "year",
        ]);
    }
}
