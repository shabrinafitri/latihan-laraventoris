<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
	protected $fillable = [
    	'kode_barang', 'nama_barang', 'keterangan_barang', 'stock',
    ];

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori','kat_id','id');
    }
}
