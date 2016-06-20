<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Penyedia;
use App\Kategori;

use Alert;

class PenyediaController extends Controller
{
    protected $redirectTo = '/penyedia';
    protected $guard = 'penyedia';

    public function index() {
    	$penyedia = Penyedia::paginate(10);

    	return view('admin.penyedia.index', compact('penyedia'));
    }

    public function changeStatus($id) {
        $penyedia = Penyedia::where('id', $id)->get()->first();
        $status_baru = $penyedia->status == 0 ? 1 : 0;

        $penyedia->status = $status_baru;
        $penyedia->save();

        Alert::success('Berhasil mengubah status!', 'Berhasil');
        return redirect('penyedia');
    }

    public function destroy($id) {
    	$penyedia = Penyedia::find($id);
        $penyedia->delete();

        Alert::success('Berhasil menghapus penyedia!', 'Terhapus');
        return redirect('penyedia');
    }

    /*
    |------------------------
    | VISITOR
    |------------------------
    */

    public function dashboard() {
        $dash = true;
        $penyedia = Penyedia::find(auth('penyedia')->user()->id)->get()->first();

        return view('pages.penyedia.dashboard', compact('dash', 'penyedia'));
    }

    public function login() {
        if (Auth::guard('penyedia')->check()) {
            return redirect('penyedia/dashboard');
        }
        return view('pages.penyedia.login');
    }

    public function logout() {
        auth('penyedia')->logout();
        return redirect('/');
    }
    
    public function register(){
        $kategori = Kategori::all();

        return view('pages.penyedia.register', compact('kategori'));
    }

    public function registerProcess(Request $request) {
        $validation = Validator::make($request->all(), [
            'nama' => 'required|min:6',
            'logo' => 'required|mimes:jpg,jpeg,JPEG,png',
            'email' => 'required|email|unique:pelamar,email',
            'alamat' => 'required|min:10',
            'id_kategori' => 'required',
            'website' => 'required',
            'telepon' => 'required|min:9',
            'username' => 'required|min:5|unique:penyedia,username',
            'password' => 'required|min:6'
        ]);

        if ($validation->fails()) {
            return redirect('penyedia/daftar')
                ->withErrors($validation)
                ->withInput();
        }

        $image = $request->file('logo')->getClientOriginalName();
        $dest  = base_path() . '/public/uploads';
        $request->file('logo')->move($dest, $image);

        $data = $request->all();
        $data['logo'] = $image;
        $data['password'] = bcrypt($request->password);

        Penyedia::create($data);

        return redirect('penyedia/login')->with('success', 'Pendaftaran berhasil, silahkan login.');
    }

    public function loginProcess(Request $request) {

        $validation = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validation->fails()) {
            return redirect('penyedia/login')
                ->withErrors($validation);
        }

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth('penyedia')->attempt($credentials)) {
            return redirect('penyedia/dashboard');
        }

        return redirect('penyedia/login')->withErrors(['Username / Password Salah!']);
    }
}
