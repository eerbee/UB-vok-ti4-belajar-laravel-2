<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'table_fakultas';

    protected $primaryKey = 'tfakultas_id';

    protected $fillable = ['tfakultas_id','tfakultas_nama'];

    public function table_jurusan()
    { 
      	return $this->hasMany('App\Jurusan','tjurusan_fakultas','tfakultas_id'); 
	}
}
