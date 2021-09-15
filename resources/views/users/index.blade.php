@extends('layouts.global')
@section('title')
User Manajement
@endsection

@section('content')
<div class="index">
    <x-app-card col1="col-lg-12" col2="">
        <x-slot name="header1">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('users.create') }}" class="btn btn-secondary waves-effect waves-light">
                    Tambah Data
                </a>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-outline-secondary waves-effect waves-light">
                    Tambah Data
                </a>
                <a href="{{ route('users.create') }}" class="btn btn-outline-secondary waves-effect waves-light">
                    Tambah Data
                </a>
            </div> --}}
            <h4 class=" font-16 mt-0">User Manajement</h4>

        </x-slot>

        <x-slot name="body1">
            <table id="table-users" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="text-center text-bold">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </x-slot>

    </x-app-card>
    @include('users.delete')
</div>
@endsection



@section('javascript')
<script>
    $(document).ready(function () {
        $('#form-insert-users').parsley();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-users').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [3]
            }],
            columns: [{
                data: 'pegawai',
            }, {
                data: 'username',
            }, {
                data: 'roles'
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
    $('#form-insert-users').on('submit', function (e) {
        e.preventDefault();
        $('#submit').html('Sending..');
        $.ajax({
            data: $('#form-insert-users')
                .serialize(),
            url: "{{ route('users.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#form-insert-users').trigger("reset");
                $('#submit').html('Simpan');
                let oTable = $('#table-users').dataTable();
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
        $('#delete-users-modal').modal('show');

        $('#delete-users-button').click(function () {
            $.ajax({
                url: "users/" + dataId,
                type: 'delete',
                beforeSend: function () {
                    $('#delete-users-button').text('Loading ...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#delete-users-modal').modal('hide');
                        $('#delete-users-button').text('Hapus');
                        let oTable = $('#table-users').dataTable();
                        oTable.fnDraw(false);
                    });
                }
            })
        });
    });

</script>
@endsection
