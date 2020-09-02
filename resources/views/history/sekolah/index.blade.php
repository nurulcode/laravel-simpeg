@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('sekolah.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="table_sekolah" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Nama Sekolah</th>
                            <th>tingkat</th>
                            <th>Nomor, Tgl Ijazah</th>
                            <th>Nama Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('history.sekolah.delete')
</div>
@endsect
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
        $('#table_sekolah').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('sekolah.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [0, 4]
            }],
            columns: [{
                data: 'nama_sekolah',
            }, {
                data: 'tingkat',
            }, {
                data: 'nti',
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
        $('#delete-sekolah-modal').modal('show');
    });

    $('#delete-sekolah-button').click(function () {
        $.ajax({

            url: "sekolah/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-sekolah-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-sekolah-modal').modal('hide');
                    $('#delete-sekolah-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_sekolah').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
