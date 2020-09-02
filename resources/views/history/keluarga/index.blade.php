@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('keluarga.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="table_keluarga" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Nama Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('history.keluarga.delete')
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    // Get Data
    $(document).ready(function () {
        $('#table_keluarga').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('keluarga.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [0, 4]
            }],
            columns: [{
                data: 'nik',
            }, {
                data: 'nama_lengkap',
            }, {
                data: 'ttl',
            }, {
                data: 'pegawai.nama_pegawai',
            }, {
                data: 'action',
            }],
            order: [
                [0, 'asc']
            ]
        });
    });

    //Delete Data
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#delete-keluarga-modal').modal('show');
    });

    $('#delete-keluarga-button').click(function () {
        $.ajax({

            url: "keluarga/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-keluarga-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-keluarga-modal').modal('hide');
                    $('#delete-keluarga-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_keluarga').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
