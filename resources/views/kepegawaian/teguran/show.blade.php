@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('kepegawaian.teguran.create')
                <hr>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th>Jenis</th>
                            <th>Nomor</th>
                            <th>Tanggal Surat</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tegurans as $result)
                        <tr>
                            <td>{{ $result->jenis }}</td>
                            <td>{{ $result->nomor }}</td>
                            <td>{{ $result->tgl_surat }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="{{ asset('storage/' . $result->file_surat) }}" target="_blank">Lihat Surat</a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('teguran.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('teguran.destroy', $result->id) }}" method="post">
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
            {{-- @include('teguran.edit') --}}
        </div>
    </div>
</div>
@endsection
