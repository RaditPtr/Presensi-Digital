@extends('layout.layout')
@section('title', 'Tambah Jenis Surat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Guru
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Id Guru</label>
                                    <input type="text" class="form-control" name="id_guru" />
                                    <label>Nama Guru</label>
                                    <input type="text" class="form-control" name="id_guru" />
                                    <label>Foto Guru</label>
                                    <input type="file" class="form-control" name="file" />
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
