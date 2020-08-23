@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('teguran.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Unit Kerja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                        <tr>
                            <td>{{ $pegawai->nip }}</td>
                            <td>{{ $pegawai->nama_lengkap }}</td>
                            <td>{{ $pegawai->tempat_lahir }}, <br> {{ $pegawai->tanggal_lahir }}</td>
                            <td>{{ $pegawai->unit->nama }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="{{ route('teguran.show', $pegawai->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @include('teguran.edit') --}}
        </div>
    </div>
</div>
@endsection
