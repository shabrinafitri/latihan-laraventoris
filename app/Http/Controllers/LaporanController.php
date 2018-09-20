<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Barang;
use App\Peminjaman;
use App\Reparasi;
use App\Mutasi;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }

    public function siswaPdf()
    {
        $data['users'] = User::where('role', 1)->get();
        $pdf = PDF::loadview('laporan.pdf-siswa', $data);
        return $pdf->download('siswa_data.pdf');
    }

    public function barangPdf()
    {
        $data['barang'] = Barang::get();
        $pdf = PDF::loadview('laporan.pdf-barang', $data);
        return $pdf->download('barang_data.pdf');
    }

    public function peminjamanPdf()
    {
        $data['peminjaman'] = Peminjaman::all();
        $pdf = PDF::loadview('laporan.pdf-peminjaman', $data);
        return $pdf->download('peminjaman_data.pdf');
    }

    public function reparasiPdf()
    {
        $data['reparasi'] = Reparasi::all();
        $pdf = PDF::loadview('laporan.pdf-reparasi', $data);
        return $pdf->download('reparasi_data.pdf');
    }

    public function mutasiPdf()
    {
        $data['mutasi'] = Mutasi::all();
        $pdf = PDF::loadview('laporan.pdf-mutasi', $data);
        return $pdf->download('mutasi_data.pdf');
    }    
}