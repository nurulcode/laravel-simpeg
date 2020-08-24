@extends("layouts.global")

@section("title") Kepegawaian @endsection
@section("page-title") Kepegawaian Arsip @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Kepegawaian Arsip</h4>
                <br>
                <form action="{{ route('arsip.update', $arsip->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>
                        <div class="form-group row">
                            <label for="pegawai" class="col-sm-2 col-form-label">Pegawai</label>
                            <div class="col-sm-10">
                                <select id="pegawai" class="form-control select2 {{ $errors->has('pegawai_id') ? 'is-invalid' : '' }}" name="pegawai_id">
                                    <option value="">--Pilih--</option>
                                    @foreach($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == old('pegawai_id', $arsip->pegawai_id) ? 'selected' : '' }}>{{ $item->nip }} - {{ $item->nama_lengkap }}
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
                            <label class="col-sm-2 col-form-label">Nama Arsip</label>
                            <div class="col-sm-10">
                                <input name="nama" value="{{ old('nama', $arsip->nama) }}" type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}">
                                <small class="text-danger">*. Ijazah SD, Ijazah SMP, Ijazah SMA, Dll</small>
                                @if($errors->has('nama'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <input name="jenis" value="{{ old('jenis', $arsip->jenis) }}" type="text" class="form-control {{ $errors->has('jenis') ? 'is-invalid' : '' }}">
                                <small class="text-danger">*. Ktp, KK, SIM, Ijazah Dll</small>
                                @if($errors->has('jenis'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('jenis') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_arsip" class="col-sm-2 col-form-label">Berkas Arsip</label>
                            <div class="col-sm-10">
                                <input id="file_arsip" type="file" name="file_arsip" class="filestyle {{ $errors->has('file_arsip') ? 'is-invalid' : '' }}" data-buttonname="btn-secondary">
                                @if($errors->has('file_arsip'))
                                <div>
                                    <small class="text-danger">{{ $errors->first('file_arsip') }}</small>
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
