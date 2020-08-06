@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('pegawais.create') }}" class="btn btn-primary waves-light mb-3"> Tambah Data</a>

                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Nama</th>
                            <th>Tempat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                            <tr>
                                <td>
                                    <a class="" href="{{ route('pegawais.show', $pegawai->id) }}">{{ $pegawai->nama_lengkap }}</a>
                                </td>
                                <td>{{ $pegawai->tempat_lahir }}</td>
                                <td>{{ $pegawai->tanggal_lahir }}</td>
                                <td class="text-center">
                                    {{ $pegawai->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                                <td>{{ $pegawai->phone }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pegawais.edit', $pegawai->id) }}">Edit</a>
                                    <a href="">Delete</a>
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
