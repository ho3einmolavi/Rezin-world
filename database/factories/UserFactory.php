<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => '09'.$faker->numberBetween(100000000 , 999999999),
        'password' => bcrypt('123456789'), // password
        'api_token' => Str::random(256),
        'state' => $faker->city ,
        'city' => $faker->city ,
        'address' => $faker->address
    ];
});

$factory->define(\App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'main_category_id' => $faker->numberBetween(1, 9) ,
    ];
});


$factory->define(\App\MainCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(\App\SecondaryCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'main_category_id' => $faker->numberBetween(1 , 9)
    ];
});

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'main_category_id' => $faker->numberBetween(1 , 9) ,
        'secondary_category_id' => $faker->numberBetween(1 , 9),
        'price' => $faker->numberBetween(1000 , 10000) ,
        'final_price' => $faker->numberBetween(1000 , 10000) ,
        'brand_id' => $faker->numberBetween(1 , 9),
        'product_img' => 'large3.png' ,
        'description' => $faker->text ,
        'number' => 100
    ];
});
