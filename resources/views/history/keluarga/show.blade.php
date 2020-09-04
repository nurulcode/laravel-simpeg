@extends("layouts.global")
@section("title") Detail Keluarga @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Nip</th>
                                <td>: {{ $keluarga->nip ? $keluarga->nip : '-' }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td>: {{ $keluarga->nama_lengkap }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Tempat, Tanggal Lahir</th>
                                <td>: {{ $keluarga->tempat_lahir }} - {{ $keluarga->tanggal_lahir }} </td>
                            </tr>

                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>:
                                    {{ $keluarga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Pekerjaan</th>
                                <td>: {{ $keluarga->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Hubungan</th>
                                <td>: {{ $keluarga->status_string }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pendidikan</th>
                                <td>: {{ $keluarga->pendidikan->nama }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Hunungan Keluarga Dengan</th>
                                <td>: {{ $keluarga->pegawai->nama_lengkap }} </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
