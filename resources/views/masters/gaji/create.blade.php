<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('gaji.store') }}"
                    method="post">
                    @csrf
                    <div class="form-group">
                        <label>Kode</label>
                        <input name="kode" type="text"
                            class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" placeholder="Otomatis terisi" readonly>
                        @if($errors->has('kode'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('kode') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Nominal</label>
                        <input name="nominal" type="text"
                            class="form-control {{ $errors->has('nominal') ? 'is-invalid' : '' }}">
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
            </div>
        </div>
    </div>
</div>
