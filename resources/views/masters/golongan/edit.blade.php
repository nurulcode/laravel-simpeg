@extends('layouts.global')

@section('content')
<div class="row justify-content-center ">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Gologan</h4>
                <form action="{{ route('golongan.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Kode</label>
                        <input name="kode" value="{{ $golongan->kode }}" type="text" class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" readonly>
                        @if($errors->has('kode'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('kode') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Pangkat</label>
                        <input name="pangkat" value="{{ $golongan->pangkat }}" type="text" class="form-control {{ $errors->has('pangkat') ? 'is-invalid' : '' }}">
                        @if($errors->has('pangkat'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('pangkat') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Golongan</label>
                        <input name="golongan" value="{{ $golongan->golongan }}" type="text" class="form-control {{ $errors->has('golongan') ? 'is-invalid' : '' }}">
                        @if($errors->has('golongan'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('golongan') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input name="ruang" value="{{ $golongan->ruang }}" type="text" class="form-control {{ $errors->has('ruang') ? 'is-invalid' : '' }}">
                        @if($errors->has('ruang'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('ruang') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Tambah</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
