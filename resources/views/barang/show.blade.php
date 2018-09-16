@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Profil Siswa</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="font-weight-bold">Kode Barang</p>
                            <p class="font-weight-bold">Kategori Barang</p>
                            <p class="font-weight-bold">Nama Barang</p>
                            <p class="font-weight-bold">Keterangan Barang</p>
                            <p class="font-weight-bold">Jumlah Persediaan</p>
                        </div>
                        <div class="col-md-1">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $barang->kode_barang }}</p>
                            <p>{{ $barang->kategori->nama_kategori }}</p>
                            <p>{{ $barang->nama_barang }}</p>
                            <p>{{ $barang->keterangan_barang }}</p>
                            <p>{{ $barang->stok }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <button type="button" id="" class="btn btn-danger" style="width: 100%;">Hapus Data Barang</button>
                        </div> -->
                        <div class="col-md-12">
                            <a onclick="event.preventDefault();document.getElementById('edit-form').submit();" role="button" class="btn btn-warning" style="width: 100%;" >Edit Data Barang</a>
                            <form id="edit-form" action="{{ route('admin.edit.barang', $barang->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection