<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public $timestamps = false;

    public function penyedia() {
    	return $this->hasMany('App\Penyedia', 'id_kategori');
    }
}
