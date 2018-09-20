@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Data Mutasi</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="font-weight-bold">Kode Mutasi</p>
                            <p class="font-weight-bold">Kategori Barang</p>
                            <p class="font-weight-bold">Nama Barang</p>
                            <p class="font-weight-bold">Keterangan Mutasi</p>
                            <p class="font-weight-bold">Jumlah Barang Mutasi</p>
                            <p class="font-weight-bold">Status Mutasi</p>
                        </div>
                        <div class="col-md-1">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $mutasi->mutasi_id }}</p>
                            <p>{{ $mutasi->barang->kategori->nama_kategori }}</p>
                            <p>{{ $mutasi->barang->nama_barang }}</p>
                            <p>{{ $mutasi->keterangan_mutasi }}</p>
                            <p>{{ $mutasi->jumlah_barang }}</p>
                            <td>@if($mutasi->status == 'keluar')<label style="color: red;">Mutasi Keluar</label> @else <label style="color: green;">Mutasi Kedalam</label> @endif</td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection