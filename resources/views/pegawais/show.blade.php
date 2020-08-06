@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pegawai @endsection

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Foto</h4>
                <div class=""><img src="{{asset('storage/'.$pegawai->foto)}}"
                        class="img-fluid" alt="Responsive image"></div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail</h4>
                    <div class="table-responsive ">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>: {{ $pegawai->nama_lengkap }} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat, Tanggal Lahir</th>
                                    <td>: {{ $pegawai->tempat_lahir }} - {{ $pegawai->tanggal_lahir }} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama</th>
                                    <td>: {{ Str::title($pegawai->agama) }} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>:
                                        {{ $pegawai->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>: {{ $pegawai->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>: {{ $pegawai->alamat }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    @endsection
