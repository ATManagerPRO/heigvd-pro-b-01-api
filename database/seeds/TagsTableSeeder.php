<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'id' => 1,
            'user_id' => 3,
            'label' => 'Healthy',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'user_id' => 1,
            'label' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'user_id' => 1,
            'label' => 'School',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 4,
            'user_id' => 2,
            'label' => 'Gaming',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 5,
            'user_id' => 4,
            'label' => 'Facture',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 6,
            'user_id' => 4,
            'label' => 'Gaming',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 7,
            'user_id' => 4,
            'label' => 'Administratif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 8,
            'user_id' => 4,
            'label' => 'Bien-être',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 9,
            'user_id' => 4,
            'label' => 'Sorties',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 10,
            'user_id' => 4,
            'label' => 'Nourriture',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 11,
            'user_id' => 4,
            'label' => 'Life style',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tags')->insert([
            'id' => 12,
            'user_id' => 4,
            'label' => 'Cours',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
