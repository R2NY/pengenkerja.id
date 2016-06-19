<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Penyedia;

use Alert;

class PenyediaController extends Controller
{
    public function index() {
    	$penyedia = Penyedia::paginate(10);

    	return view('admin.penyedia.index', compact('penyedia'));
    }

    public function destroy($id) {
    	$penyedia = Penyedia::find($id);
        $penyedia->delete();

        Alert::success('Berhasil menghapus penyedia!', 'Terhapus');
        return redirect('penyedia');
    }
}
