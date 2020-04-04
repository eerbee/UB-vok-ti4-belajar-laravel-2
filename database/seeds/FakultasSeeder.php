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
            'Fakultas Kedokteran', 
            'Fakultas Kedokteran Gigi', 
            'Fakultas Kedokteran Hewan', 
            'Fakultas Pertanian',
            'Fakultas Peternakan',
            'Fakultas Teknik',
            'Fakultas Sipil',
            'Fakultas Perikanan dan Ilmu Kelautan', 
            'Fakultas Matematika dan IPA',
            'Fakultas Teknologi Pertanian',
            'Fakultas Ilmu Komputer',
            'Fakultas Hukum',
            'Fakultas Ekonomi dan Bisnis',
            'Fakultas Ilmu Administrasi',
            'Fakultas Ilmu Sosial dan Politik',
            'Fakultas Ilmu Budaya',
            'Program Pendidikan Vokasi',
            'Pascasarjana'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['tfakultas_nama' => $fakultas]);
        }
    }
}
