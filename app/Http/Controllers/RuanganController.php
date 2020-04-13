<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\Ruangan;
use App\Exports\RuanganExport;
use Maatwebsite\Excel\Facades\Excel;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruangans = Ruangan::when($request->src, function ($query) use ($request) 
        {
          $query->where('truangan_id', 'LIKE', "%{$request->src}%")
                ->orWhere('truangan_nama', 'LIKE', "%{$request->src}%")
                ->orWhere('tjurusan_nama', 'LIKE', "%{$request->src}%");
        })  
        ->join('table_jurusan', 'table_jurusan.tjurusan_id', '=', 'table_ruangan.truangan_jurusan')
        ->orderBy('truangan_id', 'desc')->paginate(10);

        $ruangans->appends($request->only('src'));

        $jurusans = Jurusan::all();

        return view('ruangan.index', compact('ruangans','jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = array(
            'truangan_nama' => $request->truangan_nama, 
            'truangan_jurusan' => $request->truangan_jurusan
        );

        Ruangan::create($form_data);

        return redirect('/ruangan')->with('succes', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'truangan_nama' => $request->truangan_nama, 
            'truangan_jurusan' => $request->truangan_jurusan
        );
  
        Ruangan::where('truangan_id',$id)->update($form_data);

        return redirect('/ruangan')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangans = Ruangan::findOrFail($id);
        $ruangans->delete();
        return redirect('/ruangan')->with('succes', 'Data is succesfully deleted.');
    }

    public function export_excel_ruangan(Request $request)
    {
        return Excel::download(new RuanganExport, 'ruangan-'.date("Y-m-d").'.xlsx');
    }
}
