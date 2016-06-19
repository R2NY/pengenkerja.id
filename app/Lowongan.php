<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';
    protected $timestamps = false;

    public function penyedia() {
    	return $this->belongsTo('App\Penyedia', 'id_penyedia');
    }

    public function pelamar() {
    	return $this->belongsToMany('App\Pelamar', 'lowongan_pelamar', 'id_lowongan', 'id_pelamar');
    }
}
