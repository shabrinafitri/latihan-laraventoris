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
                            <p class="font-weight-bold">NIS</p>
                            <p class="font-weight-bold">Nama Lengkap</p>
                            <p class="font-weight-bold">Jurusan</p>
                            <p class="font-weight-bold">Angkatan</p>
                        </div>
                        <div class="col-md-1">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $users->nisn }}</p>
                            <p>{{ $users->name }}</p>
                            <p>{{ $users->profile->jurusan }}</p>
                            <p>{{ $users->profile->angkatan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a onclick="event.preventDefault();document.getElementById('edit-form').submit();" role="button" class="btn btn-warning" style="width: 100%;" >Edit Data Siswa</a>
                            <form id="edit-form" action="{{ route('admin.edit.siswa', $users->id) }}" method="POST" style="display: none;">
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