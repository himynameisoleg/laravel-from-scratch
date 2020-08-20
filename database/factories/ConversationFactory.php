<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conversation;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'title' => $faker->sentence,
        'body'=> $faker->text
    ];
});
