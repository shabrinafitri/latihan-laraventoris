<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
	protected $fillable = [
    	'mutasi_id', 'barang_id', 'jumlah_barang', 'keterangan_mutasi', 'status',
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }
}
