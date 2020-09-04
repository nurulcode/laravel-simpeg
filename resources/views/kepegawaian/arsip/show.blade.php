@extends('layouts.global')
@section("title") Detail Arsip @endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- <p class="card-title text-danger text">{{ $pegawai[0]->nip }} - {{ $pegawai[0]->nama_lengkap }}</p> --}}
            <div class="card-body">
                @include('kepegawaian.arsip.create')
                <hr>
                <table id="table_arsip" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Nama</th>
                            <th>jenis</th>
                            <th>File Surat</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('kepegawaian.arsip.delete')
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
        $('#table_arsip').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('arsip.show', $arsip) }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [2, 3, 4]
            }],
            columns: [{
                data: 'nama',
            }, {
                data: 'jenis',
            }, {
                data: 'file_arsip',
            }, {
                data: 'created_at',
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
        $('#delete-arsip-modal').modal('show');
    });

    $('#delete-arsip-button').click(function () {
        $.ajax({

            url: dataId,
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
