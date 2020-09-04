@extends('layouts.global')
@section("title") Bahasa @endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('bahasa.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="table_bahasa" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Jenis Bahasa</th>
                            <th>Bahasa</th>
                            <th>Kemampuan</th>
                            <th>Kemampuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('history.bahasa.delete')
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
        $('#table_bahasa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('bahasa.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [4]
            }],
            columns: [{
                data: 'jenis_bahasa',
            }, {
                data: 'bahasa',
            }, {
                data: 'kemampuan',
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
        $('#delete-bahasa-modal').modal('show');
    });

    $('#delete-bahasa-button').click(function () {
        $.ajax({

            url: "bahasa/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-bahasa-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-bahasa-modal').modal('hide');
                    $('#delete-bahasa-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_bahasa').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
