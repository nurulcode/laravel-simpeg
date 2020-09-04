@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-right">
                <a href="{{ route('pengumuman.create') }}" class="btn btn-primary waves-light mb-3">
                    Tambah Data
                </a>
            </div>
            <div class="card-body">
                <table id="table_pengumuman" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Pesan</th>
                            <th>Exp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('pengumuman.delete')
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
        $('#table_pengumuman').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pengumuman.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [1, 2]
            }],
            columns: [{
                data: 'pesan',
            }, {
                data: 'exp',
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
        $('#delete-pengumuman-modal').modal('show');
    });

    //Delete Data
    $('#delete-pengumuman-button').click(function () {
        $.ajax({

            url: "pengumuman/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-pengumuman-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-pengumuman-modal').modal('hide');
                    $('#delete-pengumuman-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_pengumuman').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
