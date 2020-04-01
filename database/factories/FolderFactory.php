<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Folder;
use App\User;
use Faker\Generator as Faker;

$factory->define(Folder::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'label' => $faker->word . "_folder",
        'created_at' => now(),
        'updated_at' => now(),
    ];

});
