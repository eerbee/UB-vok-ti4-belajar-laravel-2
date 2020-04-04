<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurusan;
use Faker\Generator as Faker;

$factory->define(Jurusan::class, function (Faker $faker) {
    return [
        'tjurusan_nama' => $faker->word,
        'tjurusan_fakultas' => $faker->numberBetween(1,18) //Disesuaikan dengan jumlah data fakultas
    ];
});
