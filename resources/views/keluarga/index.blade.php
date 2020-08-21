@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('keluargas.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Nama Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluargas as $result)
                            <tr>

                                <td>
                                    <a class="" href="{{ route('keluargas.show', $result->id) }}">{{ $result->nik }}</a>
                                </td>
                                <td>{{ $result->nama_lengkap }}</td>
                                <td>{{ $result->tempat_lahir }}, <br> {{ $result->tanggal_lahir }}</td>
                                <td>{{ $result->nama_pegawai }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('keluargas.edit', $result->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('keluargas.show', $result->id) }}">Detail Action</a>
                                            <form action="{{ route('keluargas.destroy', $result->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" onclick="return confirm('Are you sure?')">
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
        </div>
    </div>
</div>
@endsection
