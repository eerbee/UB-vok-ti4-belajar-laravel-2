<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'table_barang';

    protected $primaryKey = 'tbarang_id';

    protected $fillable = ['tbarang_id','tbarang_nama','tbarang_total','tbarang_broken','tbarang_ruangan','tbarang_gambar','tbarang_created_by','tbarang_updated_by'];

    public function table_ruangan()
    {
    	return $this->belongsTo('App\Ruangan','tbarang_ruangan','truangan_id');
    }
}
