<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "retail" => $faker->randomNumber(2),
        "wholesale" => $faker->randomNumber(2),
        "categorie_id" => factory('App\Category')->create(),
        "link" => $faker->name,
    ];
});
