<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name'        =>  $faker->name(1),
        'profession'  =>  $faker->jobTitle(1),
        'task'        =>  $faker->paragraph(1)
    ];
});
