@extends("layouts.global")
@section("title") Detail Pegawai @endsection

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
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
                                <i class="fas fa-cog"></i>
                            </span> <span class="d-none d-sm-block">Suami Istri</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#anak-1" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none">
                                <i class="fas fa-cog"></i>
                            </span> <span class="d-none d-sm-block">Anak</span>
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
                <!--  Contents -->
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                        @include('pegawai.contents.profile', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="suami-istri-1" role="tabpanel">
                        @include('pegawai.contents.suami_istri', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="anak-1" role="tabpanel">
                        @include('pegawai.contents.anak', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="orang-tua-1" role="tabpanel">
                        @include('pegawai.contents.orang_tua', ['pegawai' => $pegawai])
                    </div>
                    <div class="tab-pane p-3" id="pendidikan-1" role="tabpanel">
                        @include('pegawai.contents.riwayat_pendidikan', ['pegawai' => $pegawai])
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-2">
        <a href="{{ route('pegawai.report_pegawai', $pegawai->id) }}" class="btn btn-outline  btn-block waves-effect waves-light block mb-2 mt-1" target="_blank">Print</a>

        <a href="#" class="btn btn-outline btn-block waves-effect waves-light block p-1" data-toggle="modal" data-target=".arsip">Arsip</a>
        <a href="#" class="btn btn-outline btn-block waves-effect waves-light block p-1" data-toggle="modal" data-target=".teguran">Teguran</a>
    </div>

    {{-- Models --}}

    @include('pegawai.modals.teguran', ['pegawai' => $pegawai])
    @include('pegawai.modals.arsip', ['pegawai' => $pegawai])

</div>
@endsection
