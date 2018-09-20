@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Data Peminjaman</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="font-weight-bold">ID Peminjaman</p>
                            <p class="font-weight-bold">NISN</p>
                            <p class="font-weight-bold">Nama Lengkap</p>
                            <p class="font-weight-bold">Jurusan</p>
                            <p class="font-weight-bold">Angkatan</p>
                            <p class="font-weight-bold">Kode Barang</p>
                            <p class="font-weight-bold">Kategori Barang</p>
                            <p class="font-weight-bold">Nama Barang</p>
                            <p class="font-weight-bold">Keterangan Barang</p>
                            <p class="font-weight-bold">Jumlah Peminjaman</p>
                            <p class="font-weight-bold">Status Peminjaman</p>
                        </div>
                        <div class="col-md-1">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $peminjaman->peminjaman_id }}</p>
                            <p>{{ $peminjaman->user->nisn }}</p>
                            <p>{{ $peminjaman->user->name }}</p>
                            <p>{{ $peminjaman->user->profile->jurusan }}</p>
                            <p>{{ $peminjaman->user->profile->angkatan }}</p>
                            <p>{{ $peminjaman->barang->kode_barang }}</p>
                            <p>{{ $peminjaman->barang->kategori->nama_kategori }}</p>
                            <p>{{ $peminjaman->barang->nama_barang }}</p>
                            <p>{{ $peminjaman->barang->keterangan_barang }}</p>
                            <p>{{ $peminjaman->jumlah_barang }} Barang</p>
                            <td>@if($peminjaman->status == 'dipinjam')<label style="color: red;">Belum Dikembalikan</label> @else <label style="color: green;">Telah Dikembalikan</label> @endif</td>
                        </div>
                    </div>
                    @if(Auth::user()->role == 2)
                    <div class="row">
                        <div class="col-md-12">
                            <a role="button" href="{{ route('admin.return.peminjaman-barang', $peminjaman->id ) }}" class="btn btn-danger" style="width: 100%;">Kembalikan Barang</a>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection