@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Data Reparasi</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="font-weight-bold">Kode Reparasi</p>
                            <p class="font-weight-bold">Kategori Barang</p>
                            <p class="font-weight-bold">Nama Barang</p>
                            <p class="font-weight-bold">Keterangan Reparasi</p>
                            <p class="font-weight-bold">Jumlah Perbaikan</p>
                            <p class="font-weight-bold">Status Reparasi</p>
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
                            <p>{{ $reparasi->reparasi_id }}</p>
                            <p>{{ $reparasi->barang->kategori->nama_kategori }}</p>
                            <p>{{ $reparasi->barang->nama_barang }}</p>
                            <p>{{ $reparasi->keterangan_reparasi }}</p>
                            <p>{{ $reparasi->jumlah_barang }}</p>
                            <td>@if($reparasi->status == 1)<label style="color: red;">Perbaikan</label> @else <label style="color: green;">Telah Diperbaiki</label> @endif</td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a role="button" href="{{ route('admin.return.reparasi-barang', $reparasi->id ) }}" class="btn btn-danger" style="width: 100%;">Barang Telah Diperbaiki</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection