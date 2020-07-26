<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker, $attributes = []) {
    $faker->addProvider(new \Faker\Provider\en_GB\PhoneNumber($faker));
    return [
        'company_id' => $attributes['company_id'],
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
    ];
});
