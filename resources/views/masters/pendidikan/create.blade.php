<form action="{{ route('pendidikan.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label class="control-label">Kategori</label>
        <select class="form-control select2 {{ $errors->has('kategori') ? 'is-invalid' : '' }}" name="kategori">
            <option value="">--Pilih--</option>
            @foreach($kategoris as $item)
            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
            @endforeach
        </select>
        @if($errors->has('kategori'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('kategori') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input name="nama" type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
        @if($errors->has('nama'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('nama') }}</strong>
        </div>
        @endif
    </div>


    <div class="form-group">
        <label>Jumlah Laki</label>
        <input name="laki" type="text" class="form-control {{ $errors->has('laki') ? 'is-invalid' : '' }}">
        @if($errors->has('laki'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('laki') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group">
        <label>Jumlah Perempuan</label>
        <input name="perempuan" type="text" class="form-control {{ $errors->has('perempuan') ? 'is-invalid' : '' }}">
        @if($errors->has('perempuan'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('perempuan') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group mb-0">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
        </div>
    </div>
</form>
