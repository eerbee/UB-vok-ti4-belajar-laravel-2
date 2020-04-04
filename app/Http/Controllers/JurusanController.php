<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jurusans = Jurusan::when($request->src, function ($query) use ($request) 
        {
          $query->where('tjurusan_id', 'LIKE', "%{$request->src}%")
                ->orWhere('tjurusan_nama', 'LIKE', "%{$request->src}%")
                ->orWhere('tfakultas_nama', 'LIKE', "%{$request->src}%");
        })  
        ->join('table_fakultas', 'table_fakultas.tfakultas_id', '=', 'table_jurusan.tjurusan_fakultas')
        ->orderBy('tjurusan_id', 'desc')->paginate(10);

        $jurusans->appends($request->only('src'));

        $fakultass= Fakultas::all();

        return view('jurusan.index', compact('jurusans','fakultass'));
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
            'tjurusan_nama' => $request->tjurusan_nama, 
            'tjurusan_fakultas' => $request->tjurusan_fakultas
        );

        Jurusan::create($form_data);

        return redirect('/jurusan')->with('succes', 'Data is succesfully Added.');
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
            'tjurusan_nama' => $request->tjurusan_nama, 
            'tjurusan_fakultas' => $request->tjurusan_fakultas
        );
  
        Jurusan::where('tjurusan_id',$id)->update($form_data);

        return redirect('/jurusan')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusans = Jurusan::findOrFail($id);
        $jurusans->delete();
        return redirect('/jurusan')->with('succes', 'Data is succesfully deleted.');
    }
}
