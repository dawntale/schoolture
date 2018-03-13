<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
    	'staff_id' => $faker->randomNumber(8),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'),
        'birthdate' => $faker->date,
        'position_id' => $faker->numberBetween(1, 4)
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
        'grade_id' => $faker->numberBetween(1, 12)
    ];
});