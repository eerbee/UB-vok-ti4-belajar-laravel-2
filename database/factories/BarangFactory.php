<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'tbarang_nama' => $faker->word,
        'tbarang_total' => $faker->numberBetween(1,17),
        'tbarang_broken' => $faker->numberBetween(1,17),
        'tbarang_ruangan' => $faker->numberBetween(1,17) //Disesuaikan dengan jumlah data ruangan
    ];
});
