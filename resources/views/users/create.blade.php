@extends("layouts.global")

@section("title") Tambah @endsection
@section("page-title") Tambah User @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah User</h4>
                <br>
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-Mail</label>
                            <div class="col-sm-9">
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input name="confirm-password" value="{{ old('confirm-password') }}" type="text" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}">
                                @if($errors->has('confirm-password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('confirm-password') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input name="password" value="{{ old('password') }}" type="text" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Roles</label>
                            <div class="col-sm-9">
                                @foreach ($roles as $result)
                                <input type="checkbox" name="roles[]" id="{{ $result }}" value="{{ $result }}">
                                <label for="{{ $result }}">{{ $result }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mt-5 text-right">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                    <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
