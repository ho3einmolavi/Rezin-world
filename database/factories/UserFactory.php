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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'api_token' => Str::random(191),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//        'remember_token' => Str::random(10),
    ];
});


$factory->define(\App\MainCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'discount_id' => $faker->numberBetween(1 , 7)
    ];
});

$factory->define(\App\SecondaryCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'main_category_id' => $faker->numberBetween(1 , 9)
    ];
});

$factory->define(\App\ThirdCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'main_category_id' => $faker->numberBetween(1 , 9) ,
        'secondary_category_id' => $faker->numberBetween(1 , 9)
    ];
});

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'main_category_id' => $faker->numberBetween(1 , 9) ,
        'secondary_category_id' => $faker->numberBetween(1 , 9),
        'third_category_id' => $faker->numberBetween(1 , 9),
        'price' => $faker->numberBetween(1000 , 10000) ,
        'final_price' => $faker->numberBetween(1000 , 10000) ,
        'brand_id' => $faker->numberBetween(1 , 9),
        'product_img' => 'large3.png' ,
        'description' => $faker->text
    ];
});
