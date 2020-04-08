<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\Ruangan;
use DB;

class SearchController extends Controller
{
    public function src_add_jurusan(Request $request){
        
        if($request->ajax()) {
          
            $data = Fakultas::where('tfakultas_nama', 'LIKE','%'.$request->fakultas.'%')->get();
           
            $output = '';

            if (count($data)>0) {
              
                $output .= '<select class="form-control" name="tjurusan_fakultas" required="" style="font-weight: bold; max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">';
              
                foreach ($data as $row){

                    $output .= '<option value="'.$row->tfakultas_id.'">'.$row->tfakultas_nama.'</option>';
                }
              
                $output .= '</select>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

    public function src_edit_jurusan(Request $request)
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

    public function src_add_ruangan(Request $request){
        
        if($request->ajax()) {
          
            $data = Jurusan::where('tjurusan_nama', 'LIKE','%'.$request->jurusan.'%')->get();
           
            $output = '';

            if (count($data)>0) {
              
                $output .= '<select class="form-control" name="truangan_jurusan" required="" style="font-weight: bold; max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">';
              
                foreach ($data as $row){

                    $output .= '<option value="'.$row->tjurusan_id.'">'.$row->tjurusan_nama.'</option>';
                }
              
                $output .= '</select>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

    public function src_edit_ruangan(Request $request)
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

    public function src_add_barang(Request $request){
        
        if($request->ajax()) {
          
            $data = Ruangan::where('truangan_nama', 'LIKE','%'.$request->ruangan.'%')->get();
           
            $output = '';

            if (count($data)>0) {
              
                $output .= '<select class="form-control" name="tbarang_ruangan" required="" style="font-weight: bold; max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">';
              
                foreach ($data as $row){

                    $output .= '<option value="'.$row->truangan_id.'">'.$row->truangan_nama.'</option>';
                }
              
                $output .= '</select>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

    public function src_edit_barang(Request $request)
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
