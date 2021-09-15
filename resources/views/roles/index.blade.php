@extends('layouts.global')
@section('title')
roles
@endsection

@section('content')
<div class="index">
    <x-app-card col1="col-lg-12" col2="">
        <x-slot name="header1">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('roles.create') }}" class="btn btn-outline-secondary waves-effect waves-light">
                    Tambah Data
                </a>
            </div>
        </x-slot>
        <x-slot name="body1">
            <table id="table-roles" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="text-center text-bold">
                    <tr>
                        <th>Nama</th>
                        <th>Roles</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </x-slot>

    </x-app-card>
    {{-- @include('roles.delete') --}}
</div>
@endsection



@section('javascript')
<script>
    $(document).ready(function () {
        $('#form-insert-roles').parsley();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-roles').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('roles.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [3]
            }],
            columns: [{
                data: 'name',
            }, {
                data: 'roles',
            }, {
                data: 'created_at'
            }, {
                data: 'action',
                orderable: false,
                searchable: false,
            }],
            order: [
                [0, 'asc']
            ]
        });
    });


    // Insert Data
    $('#form-insert-roles').on('submit', function (e) {
        e.preventDefault();
        $('#submit').html('Sending..');
        $.ajax({
            data: $('#form-insert-roles')
                .serialize(),
            url: "{{ route('roles.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#form-insert-roles').trigger("reset");
                $('#submit').html('Simpan');
                let oTable = $('#table-roles').dataTable();
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
        $('#delete-roles-modal').modal('show');

        $('#delete-roles-button').click(function () {
            $.ajax({
                url: "roles/" + dataId,
                type: 'delete',
                beforeSend: function () {
                    $('#delete-roles-button').text('Loading ...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#delete-roles-modal').modal('hide');
                        $('#delete-roles-button').text('Hapus');
                        let oTable = $('#table-roles').dataTable();
                        oTable.fnDraw(false);
                    });
                }
            })
        });
    });

</script>
@endsection
