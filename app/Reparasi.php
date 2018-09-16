<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparasi extends Model
{
    protected $table = 'reparasi';
	protected $fillable = [
    	'reparasi_id', 'barang_id', 'jumlah_barang', 'keterangan_reparasi', 'status',
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }
}
