@extends('layouts.global')
@section('title')
    Gaji
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Gaji</h4>
                @include('master.gaji.create')
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="table_gaji" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Kode</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
     @include('master.gaji.delete')
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
        $('#table_gaji').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('gaji.index') }}",
                type: 'GET'
            },
            columns: [{
                data: 'kode',
            }, {
                data: 'nominal',
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
        $('#delete-gaji-modal').modal('show');
    });

    $('#delete-gaji-button').click(function () {
        $.ajax({

            url: "gaji/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-gaji-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-gaji-modal').modal('hide');
                    $('#delete-gaji-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_gaji').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
