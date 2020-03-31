<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TodoList;
use Faker\Generator as Faker;

$factory->define(TodoList::class, function (Faker $faker) {
    return [
        'title' => $faker->word . '_todoList',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
