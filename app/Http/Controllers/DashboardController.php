<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Guru $guru){
        $data = [
            'guru' => $guru->all()
        ];
        return view('dashboard.index', $data);
    }

    public function create()
    {
        return view('dashboard.tambah');
    }

    public function store(Request $request, Guru $guru)
    {
        $data = $request->validate([
            'id_guru' => 'required',
            'nama_guru' => 'required'
        ]);

        // Proses Insert
        if ($data) {
            $data['id_guru'] = 1;
            // Simpan jika data terisi semua
            $guru->create($data);
            return redirect('dashboard')->with('success', 'Data jenis surat baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data jenis surat gagal ditambahkan');
        }
    }
}
