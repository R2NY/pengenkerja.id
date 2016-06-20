<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Penyedia extends Authenticatable
{	
	protected $username = 'username';
    protected $table = 'penyedia';
    public $timestamps = false;

    protected $fillable = [
    	'nama', 
    	'email',
    	'alamat',
    	'id_kategori',
    	'website',
    	'telepon',
    	'sosmed_fb',
    	'logo',
    	'username', 
    	'password'
    ];
    
    protected $hidden = [
    	'password', 
    	'remember_token'
    ];

    public function lowongan() {
    	return $this->hasMany('App\Lowongan', 'id_penyedia');
    }

    public function kategori() {
    	return $this->belongsTo('App\Kategori', 'id_kategori');
    }


}
