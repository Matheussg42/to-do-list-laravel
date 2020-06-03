<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {
    $tasklist = factory(App\TaskList::class)->create();
    
    return [
        'user_id' => $tasklist['user_id'],
        'list_id' => $tasklist['id'],
        'title' => $faker->name,
        'status' => 0,
    ];
});
