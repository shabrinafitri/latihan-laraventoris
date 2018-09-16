@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.menu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Data Siswa</div>
                <div class="card-body">
                <div class="card-title">
                    <button type="button" id="buttonModalTambahPeminjaman" class="btn btn-primary col-md-6" data-toggle="modal" data-target="#tambahModalPeminjaman" style="width: 100%;">Tambah Peminjaman</button>
                    <div class="modal fade" id="tambahModalPeminjaman" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('admin.store.peminjaman-barang') }}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" id="status" value="1">
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label for="barang_id" class="col-md-4 col-form-label text-md-right">{{ __('Siswa') }}</label>
                                                <div class="col-md-8">
                                                    <select class="custom-select col-md-12" id="user_id" name="user_id">
                                                        @foreach($users as $key)
                                                        <option value="{{$key->id}}">{{$key->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label for="barang_id" class="col-md-4 col-form-label text-md-right">{{ __('Barang') }}</label>
                                                <div class="col-md-8">
                                                    <select class="custom-select col-md-12" id="barang_id" name="barang_id">
                                                        @foreach($barang as $key)
                                                        <option value="{{$key->id}}">{{$key->nama_barang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_barang" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Barang') }}</label>
                                            <div class="col-md-8">
                                                <input id="jumlah_barang" type="number" class="form-control{{ $errors->has('jumlah_barang') ? ' is-invalid' : '' }}" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required autofocus>

                                                @if ($errors->has('jumlah_barang'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('jumlah_barang') }}</strong>
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
                    <a role="button" class="btn btn-success col-md-5" href="#">Export Data Siswa</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID Peminjaman</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $key)                            
                            <tr> 
                                <td>{{ $key->peminjaman_id }}</td>                                   
                                <td>{{ $key->user->name }}</td>
                                <td>{{ $key->barang->nama_barang }}</td>
                                <td>@if($key->status == 1)<label style="color: red;">Belum Dikembalikan</label> @else <label style="color: green;">Telah Dikembalikan</label> @endif</td>
                                <td><a href="{{ route('admin.show.peminjaman-barang', $key->id) }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<b>View</b></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection