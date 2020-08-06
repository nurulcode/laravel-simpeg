@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Default Datatable</h4>
                <p class="text-muted m-b-30">DataTables has most features enabled by default, so all
                    you need to do to use it with your own tables is to call the construction
                    function: <code>$().DataTable();</code>.</p>
                <table id="table_pegawai" class="table table-bordered dt-responsive nowrap"
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
                </table>
            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection



@section('javascript')
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

</script>
@endsection
