<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class , 200)->create();
        factory(\App\Article::class , 10)->create();
        factory(\App\User::class , 10)->create();
        factory(\App\MainCategory::class , 5)->create();
        factory(\App\SecondaryCategory::class , 10)->create();
        factory(\App\Brand::class , 10)->create();
    }
}
