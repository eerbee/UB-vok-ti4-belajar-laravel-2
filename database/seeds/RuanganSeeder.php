<?php

use Illuminate\Database\Seeder;
use App\Ruangan;
use Faker\Factory as Faker;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Ruangan::class,17)->create();
    }
}
