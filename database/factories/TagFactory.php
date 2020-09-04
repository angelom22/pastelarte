<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    $slug = Str::slug($title, '-');
    return [
        'name' => $title, 
        'slug' => $slug,
    ];
});
