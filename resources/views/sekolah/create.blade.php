@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Riwayat Pendidikan @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sekolah.store') }}" method="post">
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
                            <label>Nama Sekolah / Universitas</label>
                            <input name="nama_sekolah" value="{{ old('nama_sekolah') }}" type="text" class="form-control {{ $errors->has('nama_sekolah') ? 'is-invalid' : '' }} ">
                            @if($errors->has('nama_sekolah'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kepala Sekolah / Rektor</label>
                            <input name="rektor" value="{{ old('rektor') }}" type="text" class="form-control {{ $errors->has('rektor') ? 'is-invalid' : '' }}">
                            @if($errors->has('rektor'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('rektor') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi</label>
                            <input name="lokasi" value="{{ old('lokasi') }}" type="text" class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }} ">
                            @if($errors->has('lokasi'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('lokasi') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nomor Ijazah</label>
                            <input name="nomor" value="{{ old('nomor') }}" type="text" class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}">
                            @if($errors->has('nomor'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nomor') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Ijazah</label>
                            <div>
                                <div class="input-group">
                                    <input name="tgl_ijazah" value="{{ old('tgl_ijazah') }}" type="text" autocomplete="off" class="form-control {{ $errors->has('tgl_ijazah') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('tgl_ijazah'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('tgl_ijazah') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Tingkat Pendidikan</label>
                            <select class="form-control select2 {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" name="tingkat">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\TingkatPendidikan::toArray() as $item)
                                    <option value="{{ $item }}" {{ $item == old('tingkat') ? 'selected' : '' }}>{{ $item }} </option>
                                @endforeach
                            </select>
                            @if($errors->has('tingkat'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('tingkat') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
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
