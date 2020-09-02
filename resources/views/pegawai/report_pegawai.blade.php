<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pegawai</title>
    {{-- <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <link href="/var/www/simpeg/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="/var/www/simpeg/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="/var/www/simpeg/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/var/www/simpeg/public/assets/css/style.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> --}}

</head>

<body>
    <style type="text/css">
        * {
            font-family: 'Times New Roman', Times, serif font-size: 15px;

        }

        table tr td,
        table tr th {
            color: black;
        }

        .page-break {
            page-break-after: always;
        }
        .text-center {
            text-align: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            color: black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

    </style>

    <center>
        <h2>BADAN LAYANAN UMUM DAERAH</h2>
        <h2>RUMAH SAKIT UMUM DAERAH MANOKWARI</h2>
        <h3>DATA PEGAWAI</h3>
        <br>
    </center>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <center>
                </center>
                <p>
                    <img style="float: right; padding: 0.5em;" width="140px" height="200px"  src="{{ public_path('storage/'.$pegawai->foto) }}" class="img-fluid" alt="Responsive image">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td scope="row">Nip</td>
                                <td>: {{ $pegawai->nip }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Email</td>
                                <td>: {{ $pegawai->email }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Nama Lengkap</td>
                                <td>: {{ $pegawai->nama_lengkap }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Tempat, Tanggal Lahir</td>
                                <td>: {{ $pegawai->tempat_lahir }} - {{ $pegawai->lahir_indo }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Gol</td>
                                <td>: {{ Str::title($pegawai->golongan_darah) }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Agama</td>
                                <td>: {{ Str::title($pegawai->agama) }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Pernikahan</td>
                                <td>: {{ Str::title($pegawai->pernikahan) }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Kepegawaian</td>
                                <td>:
                                    {{ $pegawai->kepegawaian == 'PTT' ? 'Pekerja Tidak Tetap' : 'Pegawai Negri Sipil' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Jenis Kelamin</td>
                                <td>:
                                    {{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Telfon</td>
                                <td>: {{ $pegawai->telfon }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Alamat</td>
                                <td>: {{ $pegawai->alamat }} </td>
                            </tr>
                            <tr>
                                <td scope="row">Unit Kerja</td>
                                <td>: {{ $pegawai->unit->nama }} </td>
                            </tr>
                        </tbody>
                    </table>
                </p>
                {{-- <p>
                    <table>
                        <tr>
                            <th>
                            </th>
                            <td width="40%">
                                <p class="text-center">Manokwari, {{ $pegawai->today }}</p>
                                <div class="text-center">
                                    Badan Layanan Umum Daerah <br>
                                    Rumah Sakit Umum Manokwari
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Nurul Hidayat <br>
                                    Pembina Umum <br>
                                    NIP.
                                </div>
                            </td>
                        </tr>
                    </table>
                </p> --}}
            </div>
        </div>
    </div>


    {{-- <div class="page-break"></div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <center>
                    <h4 class="card-title">II. RIWAYAT KELUARGA</h4>
                </center>
                <br>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Pendidikan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @php $i=1 @endphp
                        @foreach($pegawai->keluargas as $result)
                        <tr>
                            <td>{{ $i++ }}</td>
    <td>{{ $result->nik }}</td>
    <td>{{ $result->nama_lengkap }}</td>
    <td>{{ $result->tempat_lahir }} <br> {{ $result->lahir }} </td>
    <td>{{ $result->pendidikan->nama }}</td>
    <td>{{ $result->status_string }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>

    <div class="page-break"></div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3 class="card-title">III. PENDIDIKAN</h3>
                </center>
                <br>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Pendidikan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @php $i=1 @endphp
                        @foreach($pegawai->keluargas as $result)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $result->nik }}</td>
                            <td>{{ $result->nama_lengkap }}</td>
                            <td>{{ $result->tempat_lahir }} <br> {{ $result->lahir }} </td>
                            <td>{{ $result->pendidikan->nama }}</td>
                            <td>{{ $result->status_string }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

</body>

</html>
