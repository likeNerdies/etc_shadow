<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'first_surname'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone_number'=>123456789,
       // 'plan_id'=>$faker->numberBetween(1,3),
        'subscribed_at'=>$faker->dateTimeBetween("-1years","now"),
        'remember_token' => str_random(10),
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Address::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'street' => $faker->streetName,
        'building_number'=>$faker->numberBetween(1,400),
        'floor' => $faker->numberBetween(1,10),
        'door' => $faker->numberBetween(1,5),
        'postal_code'=>$faker->numberBetween(1000,9999),
        'town'=>$faker->city,
        'province' => $faker->city,
        'country' => $faker->country
    ];
});
