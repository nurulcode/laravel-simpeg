@extends('layouts.global')
@section('title')
    Jabatan
@endsection


@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Jabatan</h4>
                @include('master.jabatan.create')
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="table_jabatan" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
     @include('master.jabatan.delete')
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
        $('#table_jabatan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('jabatan.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'kode',
                }, {
                    data: 'nama',
                }, {
                    data: 'action',
                }
            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    //Delete Data
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#delete-jabatan-modal').modal('show');
    });

    $('#delete-jabatan-button').click(function () {
        $.ajax({

            url: "jabatan/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-jabatan-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-jabatan-modal').modal('hide');
                    $('#delete-jabatan-button').text('Hapus');
                     // Reset Datatable
                    let oTable = $('#table_jabatan').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
