<?php

use Faker\Generator as Faker;

$factory->define(App\Administrator::class, function (Faker $faker) {
    return [
        'name' => 'Dawntale',
        'email' => 'admin@dawntale.id',
        'password' => Hash::make('123456'),
    ];
});

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
    	'staff_id' => $faker->randomNumber(8),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'),
        'birthdate' => $faker->date,
    ];
});

$factory->define(App\Student::class, function (Faker $faker) {
    return [
    	'student_id' => $faker->randomNumber(8),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'),
        'birthdate' => $faker->date,
        'sex' => $faker->randomElement(['Male', 'Female']),
    ];
});