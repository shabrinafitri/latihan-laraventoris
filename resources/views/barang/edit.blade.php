@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Edit Data Barang</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-12">
                            <form method="POST" action="{{ route('admin.update.barang', $barang->id) }}">
                            	{{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-md-3 col-form-label text-md-left">{{ __('Nama Barang') }}</label>
                                    <label class="col-md-1 col-form-label">:</label>
                                    <div class="col-md-8">
                                        <input id="nama_barang" type="text" class="form-control{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" name="nama_barang" value="{{ $barang->nama_barang }}" required autofocus>

                                        @if ($errors->has('nama_barang'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_barang') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label for="kat_id" class="col-md-3 col-form-label text-md-left">{{ __('Kategori') }}</label>
                                        <label class="col-md-1 col-form-label">:</label>
                                        <div class="col-md-8">
                                            <select class="custom-select col-md-8" id="kat_id" name="kat_id">
                                            	@foreach($kategori as $key)
                                                <option value="{{$key->id}}">{{$key->nama_kategori}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan_barang" class="col-md-3 col-form-label text-md-left">{{ __('Keterangan Barang') }}</label>
                                    <label class="col-md-1 col-form-label">:</label>
                                    <div class="col-md-8">
                                        <textarea id="keterangan_barang" type="text" class="form-control{{ $errors->has('keterangan_barang') ? ' is-invalid' : '' }}" name="keterangan_barang" value="{{ $barang->keterangan_barang }}" autofocus>{{ $barang->keterangan_barang }}</textarea>

                                        @if ($errors->has('keterangan_barang'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('keterangan_barang') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-md-3 col-form-label text-md-left">{{ __('Jumlah Barang') }}</label>
                                    <label class="col-md-1 col-form-label">:</label>
                                    <div class="col-md-8">
                                        <input id="stok" type="number" min="1" class="form-control{{ $errors->has('stok') ? ' is-invalid' : '' }}" name="stok" value="{{ $barang->stok }}" required autofocus>

                                        @if ($errors->has('stok'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stok') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection