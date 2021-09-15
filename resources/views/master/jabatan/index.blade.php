@extends('layouts.global')
@section('title')
Jabatan
@endsection

@section('content')
<div class="index">
    <x-app-card col1="col-lg-4" col2="col-lg-8">
        <x-slot name="body1">
            @include('master.jabatan.create')
        </x-slot>

        <x-slot name="body2">
            <table id="table-jabatan" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="text-center text-bold">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </x-slot>
    </x-app-card>
</div>
@include('master.jabatan.delete')
@endsection



@section('javascript')
<script>
    $(document).ready(function () {
        $('#form-insert-jabatan').parsley();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-jabatan').DataTable({
            processing: true,
            serverSide: true,

            ajax: {
                url: "{{ route('jabatan.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [0, 2]
            }],
            columns: [{
                data: 'kode',
            }, {
                data: 'nama',
            }, {
                data: 'action',
            }],
            order: [
                [0, 'asc']
            ]
        });
    });


    // function routeToEdit(id) {
    //     event.preventDefault();
    //     $.ajax({
    //         url: "/masters/jabatan/" + id + "/edit",
    //         type: "GET",
    //         success: function (data) {
    //             $(".index").html(data)
    //         }
    //     })
    // }

    // Insert Data
    $('#form-insert-jabatan').on('submit', function (e) {
        e.preventDefault();
        $('#submit').html('Sending..');
        $.ajax({
            data: $('#form-insert-jabatan')
                .serialize(),
            url: "{{ route('jabatan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#form-insert-jabatan').trigger("reset");
                $('#submit').html('Simpan');
                let oTable = $('#table-jabatan').dataTable();
                oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
                $('#submit').html('Simpan');
            }
        });
    })

    //Delete Data
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#delete-jabatan-modal').modal('show');

        $('#delete-jabatan-button').click(function () {
            $.ajax({
                url: "jabatan/" + dataId,
                type: 'delete',
                beforeSend: function () {
                    $('#delete-jabatan-button').text('Loading ...');
                },
                success: function (data) {
console.log('hahaha');
                    setTimeout(function () {
                        $('#delete-jabatan-modal').modal('hide');
                        $('#delete-jabatan-button').text('Hapus');
                        let oTable = $('#table-jabatan').dataTable();
                        oTable.fnDraw(false);
                    });
                }
            })
        });
    });

</script>
@endsection
