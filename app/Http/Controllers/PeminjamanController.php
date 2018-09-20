<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang::all();
        $data['users'] = User::all();
        $data['peminjaman'] = Peminjaman::paginate(10);
        return view('peminjaman.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjaman = new Peminjaman;
        $peminjaman->peminjaman_id = rand();
        $peminjaman->jumlah_barang = $request->input('jumlah_barang');
        $peminjaman->user_id = $request->input('user_id');
        $peminjaman->barang_id = $request->input('barang_id');
        $peminjaman->status = $request->input('status');
        $peminjaman->save();

        $barang = Barang::where('id','=', $request->input('barang_id'))->first();
        $total = $barang->stok - $request->input('jumlah_barang');
        $barang->stok = $total;
        $barang->save();

        return redirect()->route('admin.index.peminjaman-barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['peminjaman'] = Peminjaman::find($id);
        return view('peminjaman.show')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->status = "dikembalikan";
        $peminjaman->save();

        $barang = Barang::where('id','=', $peminjaman->barang_id)->first();
        $total = $barang->stok + $peminjaman->jumlah_barang;
        $barang->stok = $total;
        $barang->save();

        return redirect()->route('admin.show.peminjaman-barang', [$id]);
    }
}
