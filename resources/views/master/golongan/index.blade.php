@extends('layouts.global')
@section('title')
Golongan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Golongan</h4>
                @include('master.golongan.create')
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="table_golongan" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Kode</th>
                            <th>Pangkat</th>
                            <th>Golongan</th>
                            <th>Ruang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('master.golongan.delete')
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
        $('#table_golongan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('golongan.index') }}",
                type: 'GET'
            },
            columns: [{
                data: 'kode',
            }, {
                data: 'pangkat',
            }, {
                data: 'golongan',
            }, {
                data: 'ruang',
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
        $('#delete-golongan-modal').modal('show');
    });

    $('#delete-golongan-button').click(function () {
        $.ajax({

            url: "golongan/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-golongan-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-golongan-modal').modal('hide');
                    $('#delete-golongan-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_golongan').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
