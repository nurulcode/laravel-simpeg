<form action="{{ route('gaji.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Nominal</label>
        <input name="nominal" type="number" class="form-control {{ $errors->has('nominal') ? 'is-invalid' : '' }}">
        @if($errors->has('nominal'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('nominal') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group mb-0">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
        </div>
    </div>
</form>
