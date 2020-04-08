<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ruangan;
use Faker\Generator as Faker;

$factory->define(Ruangan::class, function (Faker $faker) {
    return [
    	'truangan_nama' => $faker->word,
        'truangan_jurusan' => $faker->numberBetween(1,17) //Disesuaikan dengan jumlah data jurusan
    ];
});
