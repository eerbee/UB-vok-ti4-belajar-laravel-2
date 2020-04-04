<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'table_jurusan';

    protected $primaryKey = 'tjurusan_id';

    protected $fillable = ['tjurusan_id','tjurusan_nama','tjurusan_fakultas'];

    public function table_fakultas()
    {
    	return $this->belongsTo('App\Fakultas','tjurusan_fakultas','tfakultas_id');
    }
}
