<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    $image = $faker->image("storage/app/public", 100, 100);
    $imageName = explode('/', $image)[3];
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'website' => $faker->domainName,
        'logo' => "storage/{$imageName}",
    ];
});
