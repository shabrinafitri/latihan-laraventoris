<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang::with('kategori')->paginate(10);
        return view('barang.index')->with($data);
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
        $barang = new Barang;
        $barang->kode_barang = rand();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->keterangan_barang = $request->input('keterangan_barang');
        $barang->stock_in = $request->input('final_stock');
        $barang->final_stock = $request->input('final_stock');
        $barang->kat_id = $request->input('kat_id');
        $barang->save();

        return redirect()->route('admin.index.barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['barang'] = Barang::find($id);
        return view('barang.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['barang'] = Barang::find($id);
        $data['kategori'] = Kategori::all();
        return view('barang.edit')->with($data);
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
        $barang = Barang::find($id);
        $barang->nama_barang = $request->input('nama_barang');
        $barang->keterangan_barang = $request->input('keterangan_barang');
        $barang->stok = $request->input('stok');
        $barang->kat_id = $request->input('kat_id');
        $barang->save();

        return redirect()->route('admin.show.barang', [$id]);
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
