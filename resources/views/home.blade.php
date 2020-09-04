@extends('layouts.global')

@section('title')
    Home
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Selamat Datang</h4>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets\images\services-icon\01.png" alt="" />
                            </div>
                            <h5 class="font-14 text-uppercase mt-0 text-white-50">Pegawai</h5>
                            <h4 class="font-500">{{ $pegawais }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets\images\services-icon\02.png" alt="" />
                            </div>

                            <h5 class="font-14 text-uppercase mt-0 text-white-50">PNS</h5>
                            <h4 class="font-500">{{ $pns }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets\images\services-icon\03.png" alt="" />
                            </div>

                            <h5 class="font-14 text-uppercase mt-0 text-white-50">Honor</h5>
                            <h4 class="font-500">{{ $honor }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets\images\services-icon\04.png" alt="" />
                            </div>

                            <h5 class="font-14 text-uppercase mt-0 text-white-50">Kontrak</h5>
                            <h4 class="font-500">{{ $kontrak }}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Informasi</h4>

                        @forelse ($pengumumans as $result)
                        <p class="text-black text-justify">{{ $result->pesan }}</p>
                        <p class="text-danger">Berakhir : {{ $result->exp }}</p>
                        <hr>
                        @empty
                        <h4 class="text-center">Tidak Ada Informasi Tersedia</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Jadwal Naik Pangkat Pegawai</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">(#) Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col" colspan="2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">#14256</th>
                                        <td>
                                            <div><img src="assets\images\users\user-2.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Philip Smead</div>
                                        </td>
                                        <td>15/1/2018</td>
                                        <td>$94</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14257</th>
                                        <td>
                                            <div><img src="assets\images\users\user-3.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Brent Shipley</div>
                                        </td>
                                        <td>16/1/2019</td>
                                        <td>$112</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14258</th>
                                        <td>
                                            <div><img src="assets\images\users\user-4.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Robert Sitton</div>
                                        </td>
                                        <td>17/1/2019</td>
                                        <td>$116</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14259</th>
                                        <td>
                                            <div><img src="assets\images\users\user-5.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Alberto Jackson</div>
                                        </td>
                                        <td>18/1/2019</td>
                                        <td>$109</td>
                                        <td><span class="badge badge-danger">Cancel</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14260</th>
                                        <td>
                                            <div><img src="assets\images\users\user-6.jpg" alt="" class="thumb-md rounded-circle mr-2" /> David Sanchez</div>
                                        </td>
                                        <td>19/1/2019</td>
                                        <td>$120</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Jadwal Pensiun Pegawai</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">(#) Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col" colspan="2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">#14256</th>
                                        <td>
                                            <div><img src="assets\images\users\user-2.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Philip Smead</div>
                                        </td>
                                        <td>15/1/2018</td>
                                        <td>$94</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14257</th>
                                        <td>
                                            <div><img src="assets\images\users\user-3.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Brent Shipley</div>
                                        </td>
                                        <td>16/1/2019</td>
                                        <td>$112</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14258</th>
                                        <td>
                                            <div><img src="assets\images\users\user-4.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Robert Sitton</div>
                                        </td>
                                        <td>17/1/2019</td>
                                        <td>$116</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14259</th>
                                        <td>
                                            <div><img src="assets\images\users\user-5.jpg" alt="" class="thumb-md rounded-circle mr-2" /> Alberto Jackson</div>
                                        </td>
                                        <td>18/1/2019</td>
                                        <td>$109</td>
                                        <td><span class="badge badge-danger">Cancel</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#14260</th>
                                        <td>
                                            <div><img src="assets\images\users\user-6.jpg" alt="" class="thumb-md rounded-circle mr-2" /> David Sanchez</div>
                                        </td>
                                        <td>19/1/2019</td>
                                        <td>$120</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td>
                                            <div><a href="#" class="btn btn-primary btn-sm">Edit</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
