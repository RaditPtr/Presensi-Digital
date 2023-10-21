@extends('layout.layout')
@section('title', 'Tambah Guru')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah Data Siswa
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" class="form-control" name="nis" />
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" />
                                <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                    <option selected value="">Pilih Jenis kelamin</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                                <label>Foto Siswa</label>
                                <input type="file" class="form-control" name="foto_siswa" />
                                @csrf
                            </div>
                            <div class="col-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                                <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection