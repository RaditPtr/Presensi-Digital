<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WaliKelasController extends Controller
{
    public function index(Siswa $siswa)
    {
        $data = [
            'siswa' => $siswa->all()
        ];
        return view('walikelas.index', $data);
    }

    public function create()
    {
        // $data = [
        //     'siswa' => Siswa::all()
        // ];
        return view("walikelas.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Siswa $siswa)
    {
        $data = $request->validate(
            [
                'nis' => 'required',
                'nama_siswa' => 'required',
                'jenis_kelamin' => 'required',
                'fotosiswa' => 'required|file',
            ]
        );

        if ($request->hasFile('foto_siswa')) {
            $foto_file = $request->file('foto_siswa');
            $foto_nama = $foto_file->getClientOriginalName() . time() . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_siswa'] = $foto_nama;
        }

        if ($siswa->create($data)) {
            return redirect()->to('/walikelas/surat')->with("success", "Data Surat Berhasil Ditambahkan");
        } else {
            return back()->with("error", "Data Surat Gagal Ditambahkan");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Siswa $siswa)
    {
        $siswaData = Siswa::where('nis', $id)->first();

        $data = [
            'siswa' => $siswaData
        ];

        return view('walikelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $nis = $request->input('nis');

        $data = $request->validate(
            [
                'nama_siswa' => 'sometimes',
                'foto_siswa' => 'sometimes|file'
            ]
        );

        if ($nis!== null) {
            if ($request->hasFile('foto_siswa')) {
                $foto_file = $request->file('foto_siswa');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = $foto_file->getClientOriginalName() . time() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $update_data = $siswa->where('nis',  $nis/*$request->input('nis')*/)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);
                $data['foto_siswa'] = $foto_nama;
            }
            Siswa::where('nis', $request->input('nis'))->update($data);
            return redirect()->to('/walikelas/index')->with('success', 'Data Surat Berhasil di Update');
        } else {
            return back()->with('error', 'Data Surat Gagal di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Siswa $siswa)
    {
        $nis = $request->input('nis');
        $data = Siswa::find($nis);
        $aksi = $nis->where('nis', $nis)->delete();
        // if (!$data) {
        //     return back()->with('error', 'Data Surat Gagal di Hapus');
        // }
        // $filePath = public_path('foto') . '/' . $data->file;
        // if (file_exists($filePath) && unlink($filePath)) {
        //     $aksi = Ssiswa::where('id_surat', $id_surat)->delete();

            if ($aksi) {
                $pesan = [
                    'success' => true,
                    'pesan' => 'Data berhasil di hapus'
                ];
            } else {
                $pesan = [
                    'success' => false,
                    'pesan' => 'Data gagal di hapus'
                ];
            }

            return response()->json($pesan);
        }
    }

