@extends('layouts.global')
@section("title") Edit Gaji @endsection


@section('content')
<div class="row justify-content-center ">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Gologan</h4>
                <form action="{{ route('gaji.update', $gaji->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="kode" value="{{ $gaji->kode }}" type="text" class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" placeholder="Otomatis terisi" readonly>
                        @if($errors->has('kode'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('kode') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Nominal</label>
                        <input name="nominal" value="{{ $gaji->nominal }}" type="text" class="form-control {{ $errors->has('nominal') ? 'is-invalid' : '' }}">
                        @if($errors->has('nominal'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('nominal') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
