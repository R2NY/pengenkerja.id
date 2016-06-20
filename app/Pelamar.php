<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelamar extends Authenticatable
{
    
    protected $username = 'username';
    protected $table 	= 'pelamar';
    public $timestamps 	= false;

    protected $fillable = [
    	'nama', 
        'kelamin',
    	'email',
    	'alamat',
    	'telepon',
    	'sosmed_fb',
    	'sosmed_tw',
    	'sosmed_ig',
    	'pendidikan',
    	'kemampuan',
    	'cv',
    	'username', 
    	'password'
    ];
    
    protected $hidden = [
    	'password', 
    	'remember_token'
    ];


    public function lowongan() {
        return $this->belongsToMany('App\Lowongan', 'lowongan_pelamar', 'id_pelamar', 'id_lowongan');
    }

}
