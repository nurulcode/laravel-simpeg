@extends("layouts.global")

@section("title") Tambah @endsection
@section("page-title") Tambah User @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah User</h4>
                <br>
                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>

                        <div class="form-group row">
                            <label for="pegawai" class="col-sm-3 col-form-label">Pegawai</label>
                            <div class="col-sm-9">
                                <select id="pegawai" class="form-control select2 {{ $errors->has('pegawai_id') ? 'is-invalid' : '' }}" name="pegawai_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $user->pegawai_id ? 'selected' : '' }}>{{ $item->nip }} - {{ $item->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('pegawai_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pegawai_id') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">username</label>
                            <div class="col-sm-9">
                                <input name="username" value="{{ $user->username }}" type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                @if($errors->has('username'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input name="password"  type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input name="confirm-password"  type="password" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}">
                                @if($errors->has('confirm-password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('confirm-password') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Roles</label>
                            <div class="col-sm-9">
                                @foreach ($roles as $result)
                                <input type="checkbox" name="roles[]" id="{{ $result }}" value="{{ $result }}" {{ $user->hasRole($result) ? 'checked' : ''  }}>
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
