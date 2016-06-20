<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Lowongan;

use Alert;

class LowonganController extends Controller
{
    public function index() {
        $lowongan = Lowongan::paginate(10);

        return view('admin.lowongan.index', compact('lowongan'));
    }

    public function destroy($id) {
        $lowongan = Lowongan::find($id);
        $lowongan->delete();

        Alert::success('Berhasil menghapus lowongan!', 'Terhapus');
        return redirect('lowongan');
    }

    /*
    |------------------------
    | VISITOR
    |------------------------
    */

    public function create() {
        return view('pages.lowongan.create');
    }

    public function createProcess(Request $request) {
         $validation = Validator::make($request->all(), [
            'posisi' => 'required|min:3',
            'gaji' => 'required|min:6',
            'persyaratan' => 'required',
            'deskripsi' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date'
        ]);

        if ($validation->fails()) {
            return redirect('lowongan/tambah')
                ->withErrors($validation)
                ->withInput();
        }

        $data = $request->all();
        $data['id_penyedia'] = auth('penyedia')->user()->id;

        Lowongan::create($data);

        return redirect('lowongan/tambah')->with('success', 'Berhasil menambah lowongan.');
    }    
}
