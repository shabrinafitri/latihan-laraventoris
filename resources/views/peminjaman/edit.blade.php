@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('layouts.menu')
        </div>
        <div class="col-9">
        	<div class="card">
                <div class="card-header">Edit Data Peminjaman</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-12">
                            <form method="POST" action="{{ route('admin.update.peminjaman-barang', $peminjaman->id) }}">
                            	{{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="nisn" class="col-md-3 col-form-label text-md-left">{{ __('NISN') }}</label>
                                    <label class="col-md-1 col-form-label">:</label>
                                    <div class="col-md-8">
                                        <input id="nisn" type="number" min="1" class="form-control{{ $errors->has('nisn') ? ' is-invalid' : '' }}" name="nisn" value="{{ $peminjaman->nisn }}" required autofocus>

                                        @if ($errors->has('nisn'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nisn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label for="jurusan" class="col-md-3 col-form-label text-md-left">{{ __('Jurusan') }}</label>
                                        <label class="col-md-1 col-form-label">:</label>
                                        <div class="col-md-8">
                                            <select class="custom-select col-md-12" id="jurusan" name="jurusan">
                                                @foreach($barang as $key)
                                                <option value="{{$key->kategori->id}}">{{$key->kategori->nama_kategori}}</option>
                                                @endforeach
                                                <option {{ $peminjaman->profile->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                <option {{ $peminjaman->profile->jurusan == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
                                                <option {{ $peminjaman->profile->jurusan == 'Administrasi Perkantoran' ? 'selected' : '' }}>Administrasi Perkantoran</option>
                                                <option {{ $peminjaman->profile->jurusan == 'Pemasaran' ? 'selected' : '' }}>Pemasaran</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label for="angkatan" class="col-md-3 col-form-label text-md-left">{{ __('Angkatan') }}</label>
                                        <label class="col-md-1 col-form-label">:</label>
                                        <div class="col-md-8">
                                            <select class="custom-select col-md-12" id="angkatan" name="angkatan">
                                                <option {{ $peminjaman->profile->angkatan == '2016' ? 'selected' : '' }}>2016</option>
                                                <option {{ $peminjaman->profile->angkatan == '2017' ? 'selected' : '' }}>2017</option>
                                                <option {{ $peminjaman->profile->angkatan == '2018' ? 'selected' : '' }}>2018</option>
                                                <option {{ $peminjaman->profile->angkatan == '2019' ? 'selected' : '' }}>2019</option>
                                            </select>
                                        </div>
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