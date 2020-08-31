@extends('layouts.global')
@section('title')
    Unit
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Unit</h4>
                @include('master.unit.create')
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="table_unit" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
    @include('master.unit.delete')
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
        $('#table_unit').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('unit.index') }}",
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
        $('#delete-unit-modal').modal('show');
    });

    $('#delete-unit-button').click(function () {
        $.ajax({

            url: "unit/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-unit-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-unit-modal').modal('hide');
                    $('#delete-unit-button').text('Hapus');
                     // Reset Datatable
                    let oTable = $('#table_unit').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
