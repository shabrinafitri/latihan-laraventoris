<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nisn', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSiswa()
    {
        if($this->role == 1) return true;
        return false;
    }

    public function isAdmin()
    {
        if($this->role == 2) return true;
        return false;
    }
    
    public function profile()
    {
        return $this->hasOne('App\Profile','user_id','id');
    }
}