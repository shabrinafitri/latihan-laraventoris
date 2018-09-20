<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mutasi;
use App\Barang;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang::all();
        $data['mutasi'] = Mutasi::paginate(10);
        return view('mutasi.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mutasi = new Mutasi;
        $mutasi->mutasi_id = rand();
        $mutasi->barang_id = $request->input('barang_id');
        $mutasi->jumlah_barang = $request->input('jumlah_barang');
        $mutasi->keterangan_mutasi = $request->input('keterangan_mutasi');
        $mutasi->nama_instansi = $request->input('nama_instansi');
        $mutasi->status = $request->input('status');
        $mutasi->save();

        $barang = Barang::where('id','=', $request->input('barang_id'))->first();
        
        if($request->input('status') == "keluar") {
            $barang->stok -= $request->input('jumlah_barang');
        } else {
            $barang->stok += $request->input('jumlah_barang');
        }
        $barang->update();

        return redirect()->route('admin.index.mutasi-barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['mutasi'] = Mutasi::find($id);
        return view('mutasi.show')->with($data);
    }
}
