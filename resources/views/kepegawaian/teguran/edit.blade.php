@extends("layouts.global")
@section("title") Edit Kepegawaian @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Kepegawaian Teguran</h4>
                <br>
                <form action="{{ route('teguran.update', $teguran->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>
                        <div class="form-group row">
                            <label for="pegawai" class="col-sm-2 col-form-label">Pegawai</label>
                            <div class="col-sm-10">
                                <select id="pegawai" class="form-control select2 {{ $errors->has('pegawai_id') ? 'is-invalid' : '' }}" name="pegawai_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == old('pegawai_id', $teguran->pegawai_id) ? 'selected' : '' }}>{{ $item->nip }} - {{ $item->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('pegawai_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pegawai_id') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Hukuman</label>
                            <div class="col-sm-10">
                                <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis">
                                    <option value="">--Pilih--</option>
                                    @foreach(App\Enums\JenisHukuman::asArray() as $item)
                                    <option value="{{ $item }}" {{ $item == old('jenis', $teguran->jenis) ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('jenis'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('jenis') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor Surat</label>
                            <div class="col-sm-10">
                                <input name="nomor" value="{{ old('nomor', $teguran->nomor) }}" type="text" class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}">
                                @if($errors->has('nomor'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nomor') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="datepicker-autoclose1" class="col-sm-2 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input name="tgl_surat" value="{{ old('tgl_surat', $teguran->surat) }}" type="text" class="form-control {{ $errors->has('tgl_surat') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose1" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('tgl_surat'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('tgl_surat') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_surat" class="col-sm-2 col-form-label">Berkas Surat</label>
                            <div class="col-sm-10">
                                <input id="file_surat" type="file" name="file_surat" class="filestyle {{ $errors->has('file_surat') ? 'is-invalid' : '' }}" data-buttonname="btn-secondary">
                                @if($errors->has('file_surat'))
                                <div>
                                    <small class="text-danger">{{ $errors->first('file_surat') }}</small>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-5 text-right">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                    <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                                </div>
                            </div>
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
    $(function () {
        $("#datepicker-autoclose1").datepicker({
            autoclose: !0,
        });
    });

</script>
@endsection
