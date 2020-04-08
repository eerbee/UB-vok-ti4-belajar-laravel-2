<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = 
        [
            'Kedokteran', 
            'Kedokteran Gigi', 
            'Kedokteran Hewan', 
            'Pertanian',
            'Peternakan',
            'Teknik',
            'Perikanan dan Ilmu Kelautan', 
            'Matematika dan IPA',
            'Teknologi Pertanian',
            'Ilmu Komputer',
            'Hukum',
            'Ekonomi dan Bisnis',
            'Ilmu Administrasi',
            'Ilmu Sosial dan Politik',
            'Ilmu Budaya',
            'Program Pendidikan Vokasi',
            'Pascasarjana'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['tfakultas_nama' => $fakultas]);
        }
    }
}
