<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reparasi;
use App\Barang;

class ReparasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang::all();
        $data['reparasi'] = Reparasi::paginate(10);
        return view('reparasi.index')->with($data);
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
        $reparasi = new Reparasi;
        $reparasi->reparasi_id = rand();
        $reparasi->barang_id = $request->input('barang_id');
        $reparasi->jumlah_barang = $request->input('jumlah_barang');
        $reparasi->keterangan_reparasi = $request->input('keterangan_reparasi');
        $reparasi->status = $request->input('status');
        $reparasi->save();

        $barang = Barang::where('id','=', $request->input('barang_id'))->first();
        $total = $barang->stok - $request->input('jumlah_barang');
        $barang->stok = $total;
        $barang->save();

        return redirect()->route('admin.index.reparasi-barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['reparasi'] = Reparasi::find($id);
        return view('reparasi.show')->with($data);
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
    public function return($id)
    {
        $reparasi = Reparasi::find($id);
        $reparasi->status = "2";
        $reparasi->save();

        $barang = Barang::where('id','=', $reparasi->barang_id)->first();
        $total = $barang->stok + $reparasi->jumlah_barang;
        $barang->stok = $total;
        $barang->save();

        return redirect()->route('admin.show.reparasi-barang', [$id]);
    }
}
