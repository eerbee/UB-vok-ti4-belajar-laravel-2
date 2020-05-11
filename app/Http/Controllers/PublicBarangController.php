<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class PublicBarangController extends Controller
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

        return view('public.barang.index', compact('barangs'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
