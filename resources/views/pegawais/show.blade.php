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
                        @include('pegawais.contents.profile', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="suami-istri-1" role="tabpanel">
                        @include('pegawais.contents.suami_istri', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="anak-1" role="tabpanel">
                        @include('pegawais.contents.anak', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="orang-tua-1" role="tabpanel">
                        @include('pegawais.contents.orang_tua', ['pegawai' => $pegawai])
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
