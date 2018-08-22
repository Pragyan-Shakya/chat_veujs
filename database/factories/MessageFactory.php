<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Message::class, function (Faker $faker) {
    return [
        //
        'friend_id' => rand(1, 11),
        'user_id' => rand(1, 11),
        'message' => $faker->realText(20),
    ];
});
