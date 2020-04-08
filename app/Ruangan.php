<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'table_ruangan';

    protected $primaryKey = 'truangan_id';

    protected $fillable = ['truangan_id','truangan_nama','truangan_jurusan'];

    public function table_jurusan()
    {
    	return $this->belongsTo('App\Jurusan','truangan_jurusan','tjurusan_id');
    }

    public function table_barang()
    { 
      	return $this->hasMany('App\Barang','tbarang_ruangan','truangan_id'); 
	}

}
