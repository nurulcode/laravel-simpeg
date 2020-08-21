@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('sekolahs.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Nama Sekolah</th>
                            <th>Nomot, Tgl Ijazah</th>
                            <th>Pendidikan</th>
                            <th>Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sekolahs as $result)
                            <tr>
                                <td>{{ $result->nama_sekolah }} </td>
                                <td>{{ $result->nomor }} / {{ $result->tgl_ijazah }}</td>
                                <td>{{ $result->tingkat }} - {{ $result->nama_pendidikan }}</td>
                                <td>{{ $result->nama_lengkap }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('sekolahs.edit', $result->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('sekolahs.show', $result->id) }}">Detail Action</a>
                                            <div class="dropdown-divider"> </div>
                                            <form action="{{ route('sekolahs.destroy', $result->id) }}" method="post">
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
