<?php

use App\Activity;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Activity::class, function (Faker $faker) {
    $startDate = $faker->date();
    $endDate = $faker->dateTimeBetween($startDate);
    $types =  [
        'project',
        'competition',
        'seminar',
        'workshop',
        'guest_lecture',
        'co_curricular',
        'certification',
        'training',
        'other',
        'volunteer',
        'publication'
    ];

    return [
        'title'         => $faker->text(10),
        'description'   => $faker->text(255),
        'start'         => $startDate,
        'end'           => $endDate,
        'type'          => $faker->randomElement($types),
        'link'          => $faker->url,
        'meta'          => json_encode([])
    ];
});
