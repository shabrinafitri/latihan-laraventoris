<!DOCTYPE html>
<html>
<head>
	<title>Data Reparasi</title>
</head>
<body>
	<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
		.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
		.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
		.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
		.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
		.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
	</style>
	<table class="tg">
		<thead>
		<tr>
		  	<th class="tg-3wr7 center line">Kode Mutasi</th>
	      	<th class="tg-3wr7 center line">Kategori Barang</th>
	      	<th class="tg-3wr7 center line">Nama Barang</th>
	      	<th class="tg-3wr7 center line">Nama Instansi</th>
	      	<th class="tg-3wr7 center line">Keterangan Mutasi</th>
	      	<th class="tg-3wr7 center line">Jumlah Mutasi</th>
	      	<th class="tg-3wr7 center line">Status Mutasi</th>
		</tr>
		</thead>
		<tbody>
	<br>
	<tbody>
		@foreach($mutasi as $key)
		<tr>
			<td class="tg-rv4w center line" width="20%" >{{ $key->mutasi_id }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->barang->kategori->nama_kategori }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->barang->nama_barang }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->nama_instansi }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->keterangan_mutasi }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->jumlah_barang }}</td>
			<td class="tg-rv4w center line" width="20%" >{{ $key->status }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</body>
</html>