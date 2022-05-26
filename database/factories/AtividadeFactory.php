<?php

use App\Atividade;
use Faker\Generator as Faker;

$faker = \Faker\Factory::create(env('FAKER_LANGUAGE'));

$factory->define(Atividade::class, function () use ($faker) {
    return [
        'title' => $faker->text($maxNbChars = 50), //->name(),
        'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'scheduledto' => $faker->dateTimeBetween($startDate = 'now', 
        										 $endDate   = '+1 year', 
        										 $timezone  = null),
        'user_id' => 1
    ];
});
