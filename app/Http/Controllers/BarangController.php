<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\Ruangan;
use App\Barang;
use App\User;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barangs = Barang::when($request->src, function ($query) use ($request) 
        {
          $query->where('tbarang_id', 'LIKE', "%{$request->src}%")
                ->orWhere('tbarang_nama', 'LIKE', "%{$request->src}%")
                ->orWhere('tbarang_total', 'LIKE', "%{$request->src}%")
                ->orWhere('tbarang_broken', 'LIKE', "%{$request->src}%")
                ->orWhere('truangan_nama', 'LIKE', "%{$request->src}%");
        })  
        ->join('table_ruangan', 'table_ruangan.truangan_id', '=', 'table_barang.tbarang_ruangan')
        ->orderBy('tbarang_id', 'desc')->paginate(10);

        $barangs->appends($request->only('src'));

        $ruangans = Ruangan::all();
        $user = User::all();

        return view('barang.index', compact('barangs','ruangans','user'));
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
            'total_barang' => 'required|numeric',
            'barang_broken' => 'required|numeric',
            'gambar_barang' => 'required|image|max:2048'                  
        ]);

        $brg_image = $request->file('gambar_barang');
        $new_name = rand() . '.' . $brg_image->getClientOriginalExtension();
        $brg_image->move(public_path('images/barang'), $new_name);

        $form_data = array(
            'tbarang_nama' => $request->tbarang_nama, 
            'tbarang_total' => $request->total_barang, 
            'tbarang_broken' => $request->barang_broken, 
            'tbarang_ruangan' => $request->tbarang_ruangan, 
            'tbarang_gambar' => $new_name,
            'tbarang_created_by' => $request->tbarang_created_by
        );

        Barang::create($form_data);

        return redirect('/barang')->with('success', 'Data is succesfully Added.');
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
        $selected = $request->hidden_image;
        $brg_gambar = $request->file('gambar_barang');
        if($brg_gambar != '')
        {
            $request->validate([
                'total_barang' => 'required|numeric',
                'barang_broken' => 'required|numeric',
                'gambar_barang' => 'required|image|max:2048'
            ]);

            $selected = rand() . '.' . $brg_gambar->getClientOriginalExtension();
            $brg_gambar->move(public_path('images/barang'), $selected);
        }
        else
        {
            $request->validate([
                'total_barang' => 'required|numeric',
                'barang_broken' => 'required|numeric'
            ]);
        }

        $form_data = array(
            'tbarang_nama' => $request->tbarang_nama, 
            'tbarang_total' => $request->total_barang, 
            'tbarang_broken' => $request->barang_broken, 
            'tbarang_ruangan' => $request->tbarang_ruangan, 
            'tbarang_gambar' => $selected,
            'tbarang_created_by' => $request->tbarang_created_by, 
            'tbarang_updated_by' => $request->tbarang_updated_by
        );
  
        Barang::where('tbarang_id',$id)->update($form_data);

        return redirect('/barang')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();
        return redirect('/barang')->with('success', 'Data is succesfully deleted.');
    }

    public function export_excel_barang(Request $request)
    {
        return Excel::download(new BarangExport, 'barang-'.date("Y-m-d").'.xlsx');
    }
}
