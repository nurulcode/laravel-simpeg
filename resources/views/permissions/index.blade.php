@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Role @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="inner form-group">
                        <div class="inner row">
                            <div class="col-md-10 col-8">
                                <input type="text" name="name" value="{{ old('name') }}" class="inner form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " placeholder="Nama permissions ...">
                                <small class="text-danger">{{ $errors->first('role') ? $errors->first('role') : '*. superuser, user, manage-pegawai'}}</small>
                            </div>
                            <div class="col-md-2 col-4">
                                <input type="submit" class="btn btn-primary btn-block inner" value="Tambah Role">
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        @php $no = 1; @endphp
                        @foreach ($permission as $result)
                        @if ( Str::of($result->name)->contains('list') )
                            <h5>{{ Str::title(Str::of($result->name)->before('-')) }}</h5>
                        @endif
                        <input type="checkbox" value="{{ $result->id }}">
                        <label for="{{ $result->id }}">{{ $result->name }}</label>

                        @endforeach
                        <small class="text-danger">{{ $errors->first('role') }}</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
