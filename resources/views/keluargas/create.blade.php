@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Keluarga @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('keluargas.store') }}" method="post">
                    @csrf

                    <div class="form-group ">
                        <label class="control-label">Pilih Pegawai</label>
                        <select class="form-control select2 {{ $errors->has('pegawai_id') ? 'is-invalid' : '' }}" name="pegawai_id">
                            <option value="">--Pilih--</option>
                            @foreach($pegawais as $item)
                                <option value="{{ $item->id }}" {{ $item->id == old('pegawai_id') ? 'selected' : '' }}>{{ $item->nip }} - {{ $item->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('pegawai_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('pegawai_id') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nama</label>
                            <input name="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nama_lengkap'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>NIK</label>
                            <input name="nik" value="{{ old('nik') }}" type="text" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nik'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nik') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pekerjaan</label>
                            <input name="pekerjaan" value="{{ old('pekerjaan') }}" type="text" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}">
                            @if($errors->has('pekerjaan'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pekerjaan') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}">
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
                                    <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="text" autocomplete="off" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
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
                            <label class="control-label">Hubungan</label>
                            <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status">
                                <option value="">--Pilih--</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }} >Orang Tua</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }} >Suami Istri</option>
                                <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Anak</option>
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Pendidikan Terakhir</label>
                            <select class="form-control select2 {{ $errors->has('pendidikan_id') ? 'is-invalid' : '' }}" name="pendidikan_id">
                                <option value="">--Pilih--</option>
                                @foreach($pendidikans as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == old('pendidikan_id') ? 'selected' : '' }}>{{ $item->kategori }} - {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pendidikan_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pendidikan_id') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control select2 {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" name="jenis_kelamin">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\JenisKelamin::toSelectArray() as $item)
                                    <option value="{{ $item }}" {{ $item == old('jenis_kelamin') ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
