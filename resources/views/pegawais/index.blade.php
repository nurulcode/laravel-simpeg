@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('pegawais.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data</a>

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
                                    <a class=""
                                        href="{{ route('pegawais.show', $pegawai->id) }}">{{ $pegawai->nama_lengkap }}</a>
                                </td>
                                <td>{{ $pegawai->tempat_lahir }}</td>
                                <td>{{ $pegawai->tanggal_lahir }}</td>
                                <td class="text-center">
                                    {{ $pegawai->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                                <td>{{ $pegawai->phone }}</td>
                                <td class="text-center">
                                    {{-- <a href="{{ route('pegawais.edit', $pegawai->id) }}"
                                    class="btn btn-primary btn-sm waves-effect waves-light"><i
                                        class="fas fa-trash-alt"></i></a>
                                    <form
                                        action="{{ route('pegawais.destroy', $pegawai->id) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form> --}}

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
