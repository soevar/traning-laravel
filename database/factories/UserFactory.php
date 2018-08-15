<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function(Faker $faker){
    return[
        'code' => $faker->numerify('P-###'),
        'name' => $faker->numerify('Product ###'),
        'description' => $faker->sentence($nbWords=3),
    ];
});

$factory->define(App\Problem::class, function(Faker $faker){
    return[
        'title' => $faker->sentence($nbWords=3),
        'description' => $faker->sentence($nbWords=3),
        'attachment' => $faker->sentence($nbWords=3),
        'user_id' => factory(App\User::class)->create()->id,
        'product_id' => factory(App\Product::class)->create()->id,
    ];
});