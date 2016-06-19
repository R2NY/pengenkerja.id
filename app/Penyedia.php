<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    protected $table = 'penyedia';
    public $timestamps = false;

    public function lowongan() {
    	return $this->hasMany('App\Lowongan', 'id_penyedia');
    }

    public function kategori() {
    	return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
