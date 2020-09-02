@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('teguran.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="table_teguran" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
        $('#table_teguran').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('teguran.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [0, 3]
            }],
            columns: [ {
                    data: 'nip',
                }, {
                    data: 'nama_lengkap',
                }, {
                    data: 'ttl',
                },  {
                    data: 'action',
                }
            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#delete-teguran-modal').modal('show');
    });

    //Delete Data
    $('#delete-teguran-button').click(function () {
        $.ajax({

            url: "teguran/" + dataId,
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
