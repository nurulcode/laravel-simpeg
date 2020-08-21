<form action="{{ route('golongan.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Pangkat</label>
        <input name="pangkat" value="{{ old('pangkat') }}" type="text" class="form-control {{ $errors->has('pangkat') ? 'is-invalid' : '' }}">
        @if($errors->has('pangkat'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('pangkat') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group">
        <label>Golongan</label>
        <input name="golongan" value="{{ old('golongan') }}" type="text" class="form-control {{ $errors->has('golongan') ? 'is-invalid' : '' }}">
        @if($errors->has('golongan'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('golongan') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group">
        <label>Ruang</label>
        <input name="ruang" value="{{ old('ruang') }}" type="text" class="form-control {{ $errors->has('ruang') ? 'is-invalid' : '' }}">
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
