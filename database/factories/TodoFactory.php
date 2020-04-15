<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'todo_list_id' => factory(\App\TodoList::class),
        'title' => $faker->sentence,
        'details' => $faker->paragraph,
        'dueDate' => null,
        'dateTimeDone' => null,
        'reminderDateTime' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
