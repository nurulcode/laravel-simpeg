@extends('layouts.global')
@section('title')
    Pendidikan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Pendidikan</h4>
                @include('master.pendidikan.create', [
                'kategoris' => $kategoris,
                'namas' => $pendidikans
                ])
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Kategori</th>
                            <th>Sub</th>
                            <th>Tingkat</th>
                            <th>L</th>
                            <th>P</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendidikans as $result)
                        <tr>
                            <td>{{ $result->kategori }}</td>
                            <td>{{ $result->nama }}</td>
                            <td>{{ $result->tingkat }}</td>
                            <td>{{ $result->laki }}</td>
                            <td>{{ $result->perempuan }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('pendidikan.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('pendidikan.destroy', $result->id) }}" method="post">
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
            {{-- @include('pegawai.edit') --}}
        </div>
    </div><!-- end col -->
</div>
@endsection
