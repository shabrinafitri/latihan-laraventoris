@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.menu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Laporan Data</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data Siswa</h5>
                                    <a href="{{ route('admin.pdf.siswa-laporan')}}" class="btn btn-secondary">PDF</a>
                                    <a href="#" class="btn btn-secondary">XLS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data Barang</h5>
                                    <a href="{{ route('admin.pdf.barang-laporan')}}" class="btn btn-secondary">PDF</a>
                                    <a href="#" class="btn btn-secondary">XLS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pinjaman Barang</h5>
                                    <a href="{{ route('admin.pdf.peminjaman-laporan')}}" class="btn btn-secondary">PDF</a>
                                    <a href="#" class="btn btn-secondary">XLS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data Reparasi Barang</h5>
                                    <a href="{{ route('admin.pdf.reparasi-laporan')}}" class="btn btn-secondary">PDF</a>
                                    <a href="#" class="btn btn-secondary">XLS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Data Mutasi Barang</h5>
                                    <a href="{{ route('admin.pdf.mutasi-laporan')}}" class="btn btn-secondary">PDF</a>
                                    <a href="#" class="btn btn-secondary">XLS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection