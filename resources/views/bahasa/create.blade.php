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

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Search</label>
                            <input type="text" id="pegawai_id" class="form-control input-lg" placeholder="Pilih Pegawai" autocomplete="off" />
                            <small class="text-danger">{{ $errors->first('pegawai_id') }}</small>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="control-label">Pilih Pegawai</label>
                            <div id="pegawaiList"></div>
                        </div>
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

@section('javascript')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });


    $(document).ready(function () {

        $('#pegawai_id').keyup(function () {
            let query = $(this).val();
            if (query != '') {
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function (data) {
                        $('#pegawaiList').fadeIn();
                        $('#pegawaiList').html(data);
                    }
                });
            } else {
                $('#pegawaiList').fadeOut();
                $('#pegawaiList').html('');
            }
        });
    });

</script>
@endsection
