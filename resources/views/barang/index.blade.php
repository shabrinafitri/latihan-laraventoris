@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.menu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Data Barang</div>
                <div class="card-body">
                <div class="card-title">
                    <button type="button" id="buttonModalTambahBarang" class="btn btn-primary col-md-6" data-toggle="modal" data-target="#tambahModalBarang" style="width: 100%;">Tambah Data Barang</button>
                    <div class="modal fade" id="tambahModalBarang" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('admin.store.barang') }}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="stock_out" value="0">
                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-md-4 col-form-label text-md-right">{{ __('Nama Barang') }}</label>
                                            <div class="col-md-8">
                                                <input id="nama_barang" type="text" class="form-control{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" name="nama_barang" value="{{ old('nama_barang') }}" required autofocus>

                                                @if ($errors->has('nama_barang'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label for="kat_id" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
                                                <div class="col-md-8">
                                                    <select class="custom-select col-md-8" id="kat_id" name="kat_id">
                                                        @foreach($barang as $key)
                                                        <option value="{{$key->kategori->id}}">{{$key->kategori->nama_kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan_barang" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Barang') }}</label>
                                            <div class="col-md-8">
                                                <textarea id="keterangan_barang" type="text" class="form-control{{ $errors->has('keterangan_barang') ? ' is-invalid' : '' }}" name="keterangan_barang" value="{{ old('keterangan_barang') }}" autofocus></textarea>

                                                @if ($errors->has('keterangan_barang'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('keterangan_barang') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="stok" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Barang') }}</label>
                                            <div class="col-md-8">
                                                <input id="stok" type="number" class="form-control{{ $errors->has('stok') ? ' is-invalid' : '' }}" name="stok" value="{{ old('stok') }}" min="1" required autofocus>

                                                @if ($errors->has('stok'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('stok') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a role="button" class="btn btn-success col-md-5" href="#">Export Data Barang</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah Persediaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $key)                            
                            <tr>                                    
                                <td>{{ $key->kode_barang }}</td>
                                <td>{{ $key->kategori->nama_kategori }}</td>
                                <td>{{ $key->nama_barang }}</td>
                                <td>{{ $key->stok }}</td>
                                <td><a href="{{ route('admin.show.barang', $key->id) }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<b>View</b></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection