<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Pelamar;

use Alert;

class PelamarController extends Controller
{

	protected $redirectTo = '/pelamar';
	protected $guard = 'pelamar';

    public function index() {
        $pelamar = Pelamar::paginate(10);

        return view('admin.pelamar.index', compact('pelamar'));
    }

    public function changeStatus($id) {
        $pelamar = Pelamar::where('id', $id)->get()->first();
        $status_baru = $pelamar->status == 0 ? 1 : 0;

        $pelamar->status = $status_baru;
        $pelamar->save();

        Alert::success('Berhasil mengubah status!', 'Berhasil');
        return redirect('pelamar');
    }

    public function destroy($id) {
        $pelamar = Pelamar::find($id);
        $pelamar->delete();

        Alert::success('Berhasil menghapus pelamar!', 'Terhapus');
        return redirect('pelamar');
    }

    public function showText() {
    	return "Just trying...";
    }

    /*
    |------------------------
    | VISITOR
    |------------------------
    */

    public function login() {
        if (Auth::guard('pelamar')->check()) {
            return view('pages.pelamar.dashboard');
        }
        return view('pages.pelamar.login');
    }

    public function logout() {
        auth('pelamar')->logout();
        return redirect('/');
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

        if (auth('pelamar')->attempt($credentials)) {
            return view('pages.pelamar.dashboard');
        }

        return redirect('pelamar/login')->withErrors(['Username / Password Salah!']);
    }

    public function register(){
        return view('pages.pelamar.register');
    }

    public function registerProcess(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'alamat' => 'required|min:10',
            'telepon' => 'required|min:9',
            'email' => 'required|email|unique:pelamar,email',
            'username' => 'required|min:5|unique:pelamar,username',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect('pelamar/daftar')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        Pelamar::create($data);

        return redirect('pelamar/login')->with('success', 'Akun berhasil dibuat, silahkan login.')
;    }
}
