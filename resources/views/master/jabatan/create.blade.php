<form action="{{ route('jabatan.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Nama</label>
        <input name="nama" type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
        @if($errors->has('nama'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('nama') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group mb-0">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
        </div>
    </div>
</form>
