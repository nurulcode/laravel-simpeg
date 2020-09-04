@extends('layouts.global')
@section("title") User @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <td>No</td>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Access</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $result)
                        <tr>
                            <td class="text-center">{{ ++$i }}</td>
                            <td>{{ $result->pegawai == null ? '' : $result->pegawai->nama_lengkap  }}</td>
                            <td>{{ $result->username }}</td>
                            <td>{{ $result->role }}</td>
                            <td>
                                @if( !empty($result->getRoleNames()) )
                                @foreach($result->getRoleNames() as $v )
                                <label class="badge badge-primary">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm waves-effect waves-light" href="{{ route('users.show', $result->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('users.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('users.destroy', $result->id) }}" method="post">
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
        </div>
    </div>
</div>
@endsection
