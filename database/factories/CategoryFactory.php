<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
  $word = $faker->word;
  $slug = Str::slug($faker->sentence);
  return [
    'name' => $word,
    'slug' => $slug
  ];
});
