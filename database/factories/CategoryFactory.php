<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;



$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    $slug = Str::slug($title, '-');
    return [
        'name' => $title,
        'slug' => $slug,
        'description' => $faker->text(500),
    ];
});
