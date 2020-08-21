@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Validation type</h4>
                @include('master.jabatan.create')
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Bar Chart</h4>
                <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                    <li class="list-inline-item">
                        <h5 class="mb-0">2541</h5>
                        <p class="text-muted">Activated</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">84845</h5>
                        <p class="text-muted">Pending</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">12001</h5>
                        <p class="text-muted">Deactivated</p>
                    </li>
                </ul>
                <canvas id="bar" height="300"></canvas>
            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection
