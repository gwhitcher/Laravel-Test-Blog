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
//Create admin user
$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => 'admin@admin.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

//Create posts
$factory->define(App\Post::class, function ($faker) {
    $images = ['carousel/floating-boats.jpg', 'carousel/forest.jpg', 'carousel/white-beach-and-blue-sky.jpg'];
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'title' => $title,
        'subtitle' => str_limit($faker->sentence(mt_rand(10, 20)), 252),
        'page_image' => $images[mt_rand(0, 2)],
        'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'meta_description' => "Meta for $title",
        'is_draft' => false,
    ];
});

//Create tags
$factory->define(App\Tag::class, function ($faker) {
    $images = ['headers/default.jpg', 'headers/blog-bg.jpg', 'carousel/white-beach-and-blue-sky.jpg'];
    $word = $faker->word;
    return [
        'tag' => $word,
        'title' => ucfirst($word),
        'subtitle' => ucfirst($word),
        'page_image' => $images[mt_rand(0, 2)],
        'meta_description' => "Meta for $word",
        'reverse_direction' => false,
    ];
});

//Create page(s)
$factory->define(App\Page::class, function ($faker) {
    $images = ['headers/default.jpg', 'headers/blog-bg.jpg', 'carousel/white-beach-and-blue-sky.jpg'];
    return [
        'title' => 'About',
        'subtitle' => str_limit($faker->sentence(mt_rand(10, 20)), 252),
        'content_raw' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'meta_description' => str_limit($faker->sentence(mt_rand(10, 20)), 160),
        'page_image' => $images[mt_rand(0, 2)],
    ];
});