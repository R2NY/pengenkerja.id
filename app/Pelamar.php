<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelamar extends Authenticatable
{
	protected $username = 'username';

    protected $table = 'pelamar';
    
    public $timestamps = false;

    protected $fillable = ['nama', 'username', 'password'];
    protected $hidden = ['password'];

    public function lowongan() {
    	return $this->belongsToMany('App\Lowongan', 'lowongan_pelamar', 'id_pelamar', 'id_lowongan');
    }
}
