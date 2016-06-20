<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lowongan;

class PageController extends Controller
{
    public function index() {
    	$lowongan = Lowongan::orderBy('tgl_mulai', 'desc')->get();

    	return view('pages.home', compact('lowongan'));
    }
}
