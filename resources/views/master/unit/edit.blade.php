@extends('layouts.global')

@section('content')
<div class="row justify-content-center ">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Unit</h4>
                <form action="{{ route('unit.update', $unit->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="kode" value="{{ $unit->kode }}" type="text" class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" readonly>
                        @if($errors->has('kode'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('kode') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Unit</label>
                        <input name="nama" value="{{ $unit->nama }}" type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
                        @if($errors->has('nama'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('nama') }}</strong>
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
