<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fakultas;
use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fakultass = Fakultas::when($request->src, function ($query) use ($request) 
        {
              $query->where('tfakultas_id', 'LIKE', "%{$request->src}%")
                    ->orWhere('tfakultas_nama', 'LIKE', "%{$request->src}%");
        })->orderBy('tfakultas_id', 'desc')->paginate(10);

        $fakultass->appends($request->only('src'));

        return view('fakultas.index', compact('fakultass'));
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
        $request->validate([
            'tfakultas_nama' => 'required'                  
        ]);

        $form_data = array(
            'tfakultas_nama' => $request->tfakultas_nama
        );

        Fakultas::create($form_data);
        return redirect('/fakultas')->with('success', 'Data is succesfully Added.');
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
        $request->validate([
            'tfakultas_nama' => 'required'                  
        ]);

        $form_data = array(
            'tfakultas_nama' => $request->tfakultas_nama
        );
  
        Fakultas::where('tfakultas_id',$id)->update($form_data);

        return redirect('/fakultas')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fakultass = Fakultas::findOrFail($id);
        $fakultass->delete();
        return redirect('/fakultas')->with('success', 'Data is succesfully deleted.');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $filename = rand().$file->getClientOriginalName();
        $file->move('excel/fakultas',$filename);
        Excel::import(new FakultasImport, public_path('/excel/fakultas/'.$filename));
        return redirect()->route('fakultas.index')
            ->with('success','Fakultas imported successfully.');
    }
}
