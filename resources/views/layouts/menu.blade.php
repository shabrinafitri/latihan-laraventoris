<div class="list-group">
@if(Auth::user()->role == 1)
	<a href="{{ route('admin.index.barang') }}" class="list-group-item list-group-item-action">Data Barang</a>
	<a href="{{ route('admin.index.peminjaman-barang') }}" class="list-group-item list-group-item-action">Log Peminjaman Barang</a>
	@else
	<a href="{{ route('admin.index.barang') }}" class="list-group-item list-group-item-action">Data Barang</a>
	<a href="{{ route('admin.index.peminjaman-barang') }}" class="list-group-item list-group-item-action">Log Peminjaman Barang</a>
	<a href="{{ route('admin.index.siswa') }}" class="list-group-item list-group-item-action">Data Siswa</a>
	<a href="{{ route('admin.index.reparasi-barang') }}" class="list-group-item list-group-item-action">Log Reparasi Barang</a>
	<a href="{{ route('admin.index.mutasi-barang') }}" class="list-group-item list-group-item-action">Log Mutasi Barang</a>
	<a href="{{ route('admin.index.laporan') }}" class="list-group-item list-group-item-action">Laporan Data</a>
@endif
</div>