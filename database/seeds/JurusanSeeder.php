<?php

use Illuminate\Database\Seeder;
use App\Jurusan;
use Faker\Factory as Faker;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Jurusan::class,18)->create();
    }
}
