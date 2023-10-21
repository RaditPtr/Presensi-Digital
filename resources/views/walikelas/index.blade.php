@extends('layout.layout')
@section('title', 'Daftar siswa')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card bg-white">
            <div class="card-header">
                <span class="h1">
                    Data siswa
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="walikelas/tambah">
                            <btn class="btn btn-success">Tambah Siswa</btn>
                        </a>

                    </div>
                    <p>
                        <hr>
                    <table class="table table-hover table-bordered DataTable">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>NAMA SISWA</th>
                                <th>JENIS KELAMIN</th>
                                <th>FOTO SISWA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->jenis_kelamin }}</td>
                                <td>
                                    @if ($s->foto_siswa)
                                    <img src="{{ url('foto') . '/' . $s->nis }} " style="max-width: 250px; height: auto;" />
                                    @endif
                                </td>
                                <td>
                                    <a href="walikelas/edit/{{ $s->siswa }}">
                                        <btn class="btn btn-primary">EDIT</btn>
                                    </a>
                                    <btn class="btn btn-danger btnHapus" idSiswa="{{ $s->siswa }}">HAPUS</btn>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="module">
    $('.DataTable tbody').on('click', '.btnHapus', function(a) {
        a.preventDefault();
        let idSiswa = $(this).closest('.btnHapus').attr('idSiswa');
        swal.fire({
            title: "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result) => {
            if (result.isConfirmed) {
                //Ajax Delete
                $.ajax({
                    type: 'DELETE',
                    url: 'dashboard/hapus',
                    data: {
                        siswa: idSiswa,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        }
                    }
                });
            }
        });
    });
</script>

@endsection