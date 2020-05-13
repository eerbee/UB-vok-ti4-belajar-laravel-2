<?php

namespace App\Exports;

use App\Barang;
use App\Ruangan;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection,  WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('table_barang')
           ->select('table_barang.tbarang_id', 
            		'table_barang.tbarang_nama', 
            		'table_ruangan.truangan_nama', 
            		'table_barang.tbarang_total', 
            		'table_barang.tbarang_broken' , 
            		'user1.name as tbarang_created_by', 
            		'table_barang.created_at', 
            		'table_barang.updated_at')

            ->join('users as user1', 'user1.id', '=', 'table_barang.tbarang_created_by')
            ->join('table_ruangan', 'table_ruangan.truangan_id', '=', 'table_barang.tbarang_ruangan')
            ->orderBy('tbarang_id')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Nama Ruangan',
            'Total',
            'Rusak',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At'
        ];
    }
}
