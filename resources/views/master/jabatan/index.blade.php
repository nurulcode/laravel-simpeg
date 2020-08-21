@extends('layouts.global')
@section('title')
    Jabatan
@endsection


@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Jabatan</h4>
                @include('master.jabatan.create')
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result->kode }}</td>
                                <td>{{ $result->nama }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('jabatan.edit', $result->id) }}">Edit
                                                Action</a>
                                            <form
                                                action="{{ route('jabatan.destroy', $result->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                                    Delete Action
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @include('pegawais.edit') --}}
        </div>
    </div><!-- end col -->
</div>
@endsection
