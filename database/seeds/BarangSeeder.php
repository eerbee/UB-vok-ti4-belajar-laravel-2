<?php

use Illuminate\Database\Seeder;
use App\Ruangan;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Barang::class,17)->create();
    }
}
