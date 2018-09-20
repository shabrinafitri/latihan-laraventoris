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
                    <button type="button" id="buttonModalTambahSiswa" class="btn btn-primary col-md-12" data-toggle="modal" data-target="#tambahModalSiswa" style="width: 100%;">Tambah Data Siswa</button>
                    <div class="modal fade" id="tambahModalSiswa" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('admin.store.siswa') }}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="role" id="role" value="1">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>
                                            <div class="col-md-8">
                                                <input id="nisn" type="text" class="form-control{{ $errors->has('nisn') ? ' is-invalid' : '' }}" name="nisn" value="{{ old('nisn') }}" required autofocus>

                                                @if ($errors->has('nisn'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nisn') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
                                                <div class="col-md-8">
                                                    <select class="custom-select col-md-8" id="jurusan" name="jurusan">
                                                        <option selected>Administrasi Perkantoran</option>
                                                        <option>Akutansi</option>
                                                        <option>Pemasaran</option>
                                                        <option>Rekayasa Perangkat Lunak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label for="angkatan" class="col-md-4 col-form-label text-md-right">{{ __('Angkatan') }}</label>
                                                <div class="col-md-8">
                                                    <select class="custom-select col-md-8" id="angkatan" name="angkatan">
                                                        <option selected>2016</option>
                                                        <option>2017</option>
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                    </select>
                                                </div>
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
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Angkatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key)                            
                            <tr>                                    
                                <td>{{ $key->nisn }}</td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->profile->jurusan }}</td>
                                <td>{{ $key->profile->angkatan }}</td>
                                <td><a href="{{ route('admin.show.siswa', $key->id) }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<b>View</b></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection