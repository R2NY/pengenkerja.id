<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use Validator;

class PelamarController extends Controller
{

	protected $redirectTo = '/penyedia'; // Sementara
	protected $guard = 'pelamar';

	public function login() {
		if (Auth::guard('pelamar')->check()) {
			return "Anda telah login...";
		}
		return view('pages.login-pelamar');
	}

    public function loginProcess(Request $request) {

    	$validator = Validator::make($request->all(), [
    		'username' => 'required',
    		'password' => 'required|min:6'
    	]);

    	if ($validator->fails()) {
    		return redirect('pelamar/login')
    			->withErrors($validator);
    	}

    	$credentials = [
    		'username' => $request->username,
    		'password' => $request->password
    	];

    	if (auth()->guard('pelamar')->attempt($credentials)) {
    		return "Login berhasil...";
    	}

    	return redirect('pelamar/login')->withErrors(['Username / Password Salah!']);
    }
}
