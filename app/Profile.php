<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profile';
	protected $fillable = [
    	'user_id', 'jurusan', 'angkatan',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','id','user_id');
    }
}