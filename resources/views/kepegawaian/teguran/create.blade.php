<form action="{{ route('teguran.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <input name="pegawai_id" value="{{ $teguran }}" type="hidden">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Hukuman</label>
            <div class="col-sm-10">
                <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis">
                    <option value="">--Pilih--</option>
                    @foreach(App\Enums\JenisHukuman::toArray() as $item)
                    <option value="{{ $item }}" {{ $item == old('jenis') ? 'selected' : '' }}>{{ $item }}</option>
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
                <input name="nomor" value="{{ old('nomor') }}" type="text" class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}">
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
                    <input name="tgl_surat" value="{{ old('tgl_surat') }}" type="text" class="form-control {{ $errors->has('tgl_surat') ? 'is-invalid' : '' }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose1" autocomplete="off">
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
                </div>
            </div>
        </div>
    </div>
</form>

