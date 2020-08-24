@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('arsip.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Berkas</th>
                            <th>Jenis</th>
                            <th>File Arsip</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($arsips as $result)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $result->nama }}</td>
                            <td>{{ $result->jenis }}</td>

                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="{{ asset('storage/' . $result->file_arsip) }}" target="_blank">Lihat Surat</a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('arsip.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('arsip.destroy', $result->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @include('arsip.edit') --}}
        </div>
    </div>
</div>
@endsection
