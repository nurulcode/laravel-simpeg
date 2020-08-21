@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pegawai @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pegawais.update', $pegawai->id) }}" enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nip</label>
                            <input value="{{ $pegawai->nip }}" name="nip" value="{{ old('nip') }}" type="text" class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nip'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nip') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nama</label>
                            <input value="{{ $pegawai->nama_lengkap }}" name="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nama_lengkap'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telfon</label>
                            <input value="{{ $pegawai->telfon }}" name="telfon" type="text" class="form-control {{ $errors->has('telfon') ? 'is-invalid' : '' }}">
                            @if($errors->has('telfon'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('telfon') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input value="{{ $pegawai->tempat_lahir }}" name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}">
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
                                    <input value="{{ $pegawai->lahir }}" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="text" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
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
                        <div class="form-group col-md-2">
                            <label class="control-label">Agama</label>
                            <select class="form-control select2 {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\Agama::toSelectArray() as $item)
                                    <option value="{{ $item }}" {{ Str::lower($item) == $pegawai->agama ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agama'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('agama') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control select2 {{ $errors->has('jk') ? 'is-invalid' : '' }}" name="jk">
                                <option value="">--Pilih--</option>
                                <option value="L" {{ $pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki</option>
                                <option value="P" {{ $pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @if($errors->has('jk'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('jk') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Golda</label>
                            <select class="form-control select2 {{ $errors->has('golongan_darah') ? 'is-invalid' : '' }}" name="golongan_darah">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\GolonganDarah::toArray() as $item)
                                    <option value="{{ $item }}" {{ $item == $pegawai->golongan_darah ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('golongan_darah'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('golongan_darah') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label"> Pernikahan</label>
                            <select class="form-control select2 {{ $errors->has('pernikahan') ? 'is-invalid' : '' }}" name="pernikahan">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\StatusPernikahan::toSelectArray() as $item)
                                    <option value="{{ $item }}" {{ Str::lower($item) == $pegawai->pernikahan ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pernikahan'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pernikahan') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label"> Kepegawaian</label>
                            <select class="form-control select2 {{ $errors->has('kepegawaian') ? 'is-invalid' : '' }}" name="kepegawaian">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\StatusKepegawaian::toArray() as $item)
                                    <option value="{{ $item }}" {{ $item == $pegawai->kepegawaian ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kepegawaian'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('kepegawaian') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Kenaikan Pangkat</label>
                            <div>
                                <div class="input-group">
                                    <input value="{{ $pegawai->pangkat }}" name="tgl_naik_pangkat" value="{{ old('tgl_naik_pangkat') }}" type="text" class="form-control {{ $errors->has('tgl_naik_pangkat') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('tgl_naik_pangkat'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('tgl_naik_pangkat') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Kenaikan Gaji</label>
                            <div>
                                <div class="input-group">
                                    <input value="{{ $pegawai->gaji }}" name="tgl_naik_gaji" value="{{ old('tgl_naik_gaji') }}" type="text" class="form-control {{ $errors->has('tgl_naik_gaji') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('tgl_naik_gaji'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('tgl_naik_gaji') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input value="{{ $pegawai->email }}" name="email" value="{{ old('email') }}" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} ">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> Unit Kerja</label>
                            <select class="form-control select2 {{ $errors->has('unit_id') ? 'is-invalid' : '' }}" name="unit_id">
                                <option value="">--Pilih--</option>
                                @foreach($units as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $pegawai->unit_id ? 'selected' : '' }}>{{ $item->kode }} {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('unit_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('unit_id') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Avatar / Foto</label>
                            <input type="file" name="foto" class="filestyle {{ $errors->has('foto') ? 'is-invalid' : '' }}" data-buttonname="btn-secondary">
                            @if($errors->has('foto'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" rows="5">
                            {!! $pegawai->alamat !!}
                        </textarea>
                        @if($errors->has('alamat'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-0">
                        <div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                            <button type="reset" class="btn btn-secondary waves-effect">Cancel</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
