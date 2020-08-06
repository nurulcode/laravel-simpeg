@extends("layouts.global")

@section("title") Tambah Data @endsection
@section("page-title") Tambah Data Pegawai @endsection

@section('content')
<div class="row">
    {{-- <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Avatar</h4>
                    <div class=""><img src="{{ asset('assets\images\small\img-2.jpg')}}" class="img-fluid" alt="Responsive image"></div>
            </div>
        </div>
    </div><!-- end col --> --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pegawais.store') }}" enctype="multipart/form-data"
                    method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input name="nama_lengkap" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <div>
                                <div class="input-group">
                                    <input name="tanggal_lahir" type="text" class="form-control"
                                        placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Agama</label>
                            <select class="form-control select2" name="agama">
                                <option>Select</option>
                                <option>Select2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Avatar / Foto</label>
                            <input type="file" name="foto" class="filestyle" data-buttonname="btn-secondary">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label>File Pendukung</label>
                        <input type="file" name="file" class="filestyle" data-buttonname="btn-secondary">
                    </div>

                    <div class="form-group mb-0">
                        <div><button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                            <button type="reset" class="btn btn-secondary waves-effect">Cancel</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection
