@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pengumuman @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pengumuman.store') }}" method="post">
                    @csrf
                    <p class="text-muted">TAMBAH PENGUMUMAN</p>
                    <hr>
                    <div class="form-group">
                        <label>Tulis Pesan</label>
                        <textarea name="pesan" class="form-control {{ $errors->has('pesan') ? 'is-invalid' : '' }}" rows="5">{{ old('pesan') }}</textarea>
                        @if($errors->has('pesan'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('pesan') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kadaluarsa</label>
                        <div>
                            <div class="input-group">
                                <input name="exp" value="{{ old('exp') }}" type="text" class="form-control {{ $errors->has('exp') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose" autocomplete="off" autocomplete="off">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-calendar"></i>
                                    </span>
                                </div>
                                @if($errors->has('exp'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('exp') }}</strong>
                                </div>
                                @endif
                            </div>
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
