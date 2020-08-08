@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('pegawais.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Unit Kerja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                            <tr>
                                <td class="text-center">
                                    <img src="{{asset('storage/'.$pegawai->foto)}}"
                                    class="img-fluid" width="50px">
                                </td>
                                <td>
                                    <a class=""
                                        href="{{ route('pegawais.show', $pegawai->id) }}">{{ $pegawai->nip }}</a>
                                </td>
                                <td>{{ $pegawai->nama_lengkap }}</td>
                                <td>{{ $pegawai->tempat_lahir }}, <br> {{ $pegawai->tanggal_lahir }}</td>
                                {{-- <td class="text-center">
                                    {{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td> --}}
                                <td>{{ $pegawai->unit->nama }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('pegawais.edit', $pegawai->id) }}">Detail</a>
                                            <a class="dropdown-item"
                                                href="{{ route('pegawais.show', $pegawai->id) }}">Edit
                                                Action</a>
                                            <div class="dropdown-divider"> </div>
                                            <form
                                                action="{{ route('pegawais.destroy', $pegawai->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" onclick="return confirm('Are you sure?')">
                                                    Delete Action
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @include('pegawais.edit') --}}
        </div>
    </div>
</div>
@endsection



{{-- @section('javascript')
<script>
    $(document).ready(function () {
        $('#table_pegawai').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            ajax: {
                url: "{{ route('pegawais.index') }}",
type: 'GET'
},
columns: [{
data: 'nama_lengkap',
name: 'nama_lengkap'
},
{
data: 'tempat_lahir',
name: 'tempat_lahir'
},
{
data: 'tanggal_lahir',
name: 'tanggal_lahir',
},
{
data: 'jk',
name: 'jk'
},
{
data: 'phone',
name: 'phone',
},
{
data: 'action',
name: 'action'
},
],
order: [
[0, 'asc']
]
});
});

$('body').on('click', '.edit-pegawai', function () {
let id = $(this).data('id');
console.log(id);
$.get('pegawais/' + id + '/edit', function (data) {

$('#id').val(data.id);
$('#nama_lengkap').val(data.nama_lengkap);
$('#datepicker-autoclose').val(data.tanggal_lahir);
$('#phone').val(data.phone);
$('#jk').val(data.jk);
$('#alamat').val(data.alamat);
})
});

</script> --}}
{{-- @endsection --}}
