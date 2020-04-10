<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\Ruangan;
use DB;

class SearchController extends Controller
{
    public function src_jurusan(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("table_fakultas")
                    ->select("tfakultas_id","tfakultas_nama")
                    ->where('tfakultas_nama','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }

    public function src_ruangan(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("table_jurusan")
                    ->select("tjurusan_id","tjurusan_nama")
                    ->where('tjurusan_nama','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }

    public function src_barang(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("table_ruangan")
                    ->select("truangan_id","truangan_nama")
                    ->where('truangan_nama','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }
    
}
