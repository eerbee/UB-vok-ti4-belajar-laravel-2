<?php

namespace App\Exports;

use App\Ruangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class RuanganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ruangan::all();
    }
}
