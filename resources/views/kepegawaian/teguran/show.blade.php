@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->role == 'superuser')
                    @include('kepegawaian.teguran.create')
                @endif
                <hr>
                <table id="table_teguran" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Jenis</th>
                            <th>Nomor Tanggal</th>
                            <th>Tgl Surat</th>
                            <th>Berkas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('kepegawaian.teguran.delete')
</div>
@endsection

@section('javascript')
<script>
    $(function () {
        $("#datepicker-autoclose1").datepicker({
            autoclose: !0,
        });
    });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    // Get Data
    $(document).ready(function () {
        $('#table_teguran').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('teguran.show', $teguran) }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [3, 4]
            }],
            columns: [{
                data: 'jenis',
            }, {
                data: 'nomor',
            }, {
                data: 'tgl_surat',
            }, {
                data: 'file',
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
        $('#delete-teguran-modal').modal('show');
    });

    $('#delete-teguran-button').click(function () {
        $.ajax({

            url:  dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-teguran-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-teguran-modal').modal('hide');
                    $('#delete-teguran-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_teguran').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
