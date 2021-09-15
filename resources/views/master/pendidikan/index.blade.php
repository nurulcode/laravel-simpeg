@extends('layouts.global')
@section('title')
Pendidikan
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Data Pendidikan</h4>
                @include('master.pendidikan.create', [
                'kategoris' => $kategoris,
                'namas' => $pendidikans
                ])
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table id="table_pendidikan" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Sub</th>
                            <th>Tingkat</th>
                            <th>L</th>
                            <th>P</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('master.pendidikan.delete')
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
        $('#table_pendidikan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pendidikan.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [1, 2, 3, 4]
            }],
            columns: [{
                data: 'nama',
            }, {
                data: 'tingkat',
            }, {
                data: 'laki',
            }, {
                data: 'perempuan',
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
        $('#delete-pendidikan-modal').modal('show');
    });

    $('#delete-pendidikan-button').click(function () {
        $.ajax({

            url: "pendidikan/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-pendidikan-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-pendidikan-modal').modal('hide');
                    $('#delete-pendidikan-button').text('Hapus');
                    // Reset Datatable
                    let oTable = $('#table_pendidikan').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
