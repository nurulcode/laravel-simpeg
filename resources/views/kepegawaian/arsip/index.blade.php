@extends('layouts.global')
@section("title") Arsip @endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="table_arsip" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
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
        $('#table_arsip').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('arsip.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [0, 3]
            }],
            columns: [{
                data: 'nip',
            }, {
                data: 'nama_lengkap',
            }, {
                data: 'ttl',
            }, {
                data: 'action',
            }],
            order: [
                [0, 'asc']
            ]
        });
    });

    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#delete-arsip-modal').modal('show');
    });

    //Delete Data
    $('#delete-arsip-button').click(function () {
        $.ajax({

            url: "arsip/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-arsip-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-arsip-modal').modal('hide');
                    $('#delete-arsip-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_arsip').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
