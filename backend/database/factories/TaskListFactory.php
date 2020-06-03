<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TaskList;
use Faker\Generator as Faker;

$factory->define(TaskList::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->name,
        'status' => 0,
    ];
});
