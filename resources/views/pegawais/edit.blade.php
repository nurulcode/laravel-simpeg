@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pegawai @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pegawais.update', $pegawai->id) }}"
                    enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input name="nama_lengkap" value="{{ $pegawai->nama_lengkap }}" type="text"
                                class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nama_lengkap'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input name="phone" value="{{ $pegawai->phone }}" type="text"
                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}" type="text"
                                class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}">
                            @if($errors->has('tempat_lahir'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <div>
                                <div class="input-group">
                                    <input name="tanggal_lahir" value="{{ $pegawai->date }}" type="text"
                                        class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                                        placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('tanggal_lahir'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Agama</label>
                            <select
                                class="form-control select2 {{ $errors->has('agama') ? 'is-invalid' : '' }}"
                                name="agama">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\Agama::toSelectArray() as $item)
                                    <option value="{{ $item }}"
                                        {{ $item == Str::title($pegawai->agama) ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('agama'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('agama') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Jenis Kelamin</label>
                            <select
                                class="form-control select2 {{ $errors->has('jk') ? 'is-invalid' : '' }}"
                                name="jk">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\JenisKelamin::toSelectArray() as $item)
                                    <option value="{{ $item }}"
                                        {{ $item == Str::title($pegawai->jk) ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('jk'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('jk') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Avatar / Foto</label>
                            <input type="file" name="foto"
                                class="filestyle {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                data-buttonname="btn-secondary">
                            @if($errors->has('foto'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat"
                            class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                            rows="5">{{ $pegawai->alamat }}</textarea>
                        @if($errors->has('alamat'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-0">
                        <div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div><!-- end col -->

    @endsection
