<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
	protected $table = 'peminjaman';
	protected $fillable = [
    	'peminjaman_id', 'jumlah_barang', 'user_id', 'barang_id', 'status', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }
}
