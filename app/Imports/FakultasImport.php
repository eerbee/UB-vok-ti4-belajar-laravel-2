<?php

namespace App\Imports;

use App\Fakultas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FakultasImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow() : int
    {
        return 2;
    }
    /**
    * @param array $column
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $column)
    {
        return new Fakultas([
            'tfakultas_nama'=> $column[1]
        ]);
    }
}
