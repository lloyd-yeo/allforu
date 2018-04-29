<?php

$factory->define(App\Club::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
        "website" => $faker->name,
        "fb_page_url" => $faker->name,
        "ig_page_url" => $faker->name,
        "school_id" => factory('App\School')->create(),
    ];
});
