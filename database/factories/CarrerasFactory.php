<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Blog;
use Illuminate\Support\Str;
use Faker\Generator as Faker;



$factory->define(Blog::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    $slug = Str::slug($title, '-');
    $img = '/blog/12.jpg';
    return [
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->text(200),
    ];
});
