@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Riwayat Bahasa @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('bahasa.store') }}" method="post">
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
                        <div class="form-group col-md-6">
                            <label>Bahasa Bajasa</label>
                            <select class="form-control select2 {{ $errors->has('jenis_bahasa') ? 'is-invalid' : '' }}" name="jenis_bahasa">
                                <option value="">--Pilih--</option>
                                @foreach(App\Enums\JenisBahasa::toArray() as $item)
                                <option value="{{ $item }}" {{ $item == old('jenis_bahasa') ? 'selected' : '' }}>{{ $item }} </option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_bahasa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('jenis_bahasa') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Bahasa</label>
                            <input name="bahasa" value="{{ old('bahasa') }}" type="text" class="form-control {{ $errors->has('bahasa') ? 'is-invalid' : '' }}">
                            @if($errors->has('bahasa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('bahasa') }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tingkat Kemampuan</label>
                        <select class="form-control select2 {{ $errors->has('kemampuan') ? 'is-invalid' : '' }}" name="kemampuan">
                            <option value="">--Pilih--</option>
                            @foreach(App\Enums\Status::toArray() as $item)
                            <option value="{{ $item }}" {{ $item == old('kemampuan') ? 'selected' : '' }}>{{ $item }} </option>
                            @endforeach
                        </select>
                        @if($errors->has('kemampuan'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('kemampuan') }}</strong>
                        </div>
                        @endif
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
