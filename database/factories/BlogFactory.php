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
        'user_id' => rand(1,30),
        'category_id' => rand(1,20),
        'title' => $title,
        'slug' => $slug,
        'extracto' => $faker->text(200),
        'content' => $faker->text(500),
        // 'file' => $faker->imageUrl($width = 982, $height = 500),
        'file' => $img,
        'status' => $faker->randomElement(['BORRADOR', 'PUBLICADO'])
    ];
});
