@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pegawai @endsection

@section('content')
<div class="row">
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title text-center mb-3">Avatar / Foto</h4>
                <div class=""><img src="{{ asset('storage/'.$pegawai->foto) }}"
                        class="img-fluid" alt="Responsive image"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                            <span class="d-block d-sm-none">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="d-none d-sm-block">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#suami-istri-1" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none">
                                <i class="far fa-user"></i>
                            </span>
                            <span class="d-none d-sm-block">Suami Istri</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#anak-1" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none">
                                <i class="far fa-envelope"></i>
                            </span>
                            <span class="d-none d-sm-block">Anak</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#orang-tua-1" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none">
                                <i class="fas fa-cog"></i>
                            </span> <span class="d-none d-sm-block">Orang Tua</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#pendidikan-1" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none">
                                <i class="fas fa-cog"></i>
                            </span> <span class="d-none d-sm-block">Pendidikan</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                        <div class="table-responsive ">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nip</th>
                                        <td>: {{ $pegawai->nip }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>: {{ $pegawai->email }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>: {{ $pegawai->nama_lengkap }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tempat, Tanggal Lahir</th>
                                        <td>: {{ $pegawai->tempat_lahir }} - {{ $pegawai->tanggal_lahir }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gol</th>
                                        <td>: {{ Str::title($pegawai->golongan_darah) }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Agama</th>
                                        <td>: {{ Str::title($pegawai->agama) }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pernikahan</th>
                                        <td>: {{ Str::title($pegawai->pernikahan) }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kepegawaian</th>
                                        <td>:
                                            {{ $pegawai->kepegawaian == 'PTT' ? 'Pekerja Tidak Tetap' : 'Pegawai Negri Sipil' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td>:
                                            {{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telfon</th>
                                        <td>: {{ $pegawai->telfon }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td>: {{ $pegawai->alamat }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Unit Kerja</th>
                                        <td>: {{ $pegawai->unit->nama }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="suami-istri-1" role="tabpanel">
                        <div class="table-responsive ">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat, Tgl Lahir</th>
                                        <th>Pendidikan</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pegawai->keluargas as $result)
                                        @if($result->status == 2)
                                            <tr>
                                                <td>{{ $result->nik }}</td>
                                                <td>{{ $result->nama_lengkap }}</td>
                                                <td>{{ $result->tempat_lahir }}, <br> {{ $result->tanggal_lahir }}
                                                </td>
                                                <td>{{ $result->pendidikan->nama }}</td>
                                                <td>{{ $result->status_string }}</td>
                                                <td class="text-center">
                                                    <a href="#">Edit</a>
                                                    <a href="#">Delete</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane p-3" id="anak-1" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="orang-tua-1" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="pendidikan-1" role="tabpanel">
                        <p class="mb-0">Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before
                            they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack
                            portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl
                            keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby
                            sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical.
                            Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
