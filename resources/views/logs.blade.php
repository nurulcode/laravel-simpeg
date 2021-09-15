@extends('layouts.global')
@section('title')
logs
@endsection

@section('content')
<div class="index">
    <x-app-card col1="col-lg-12" col2="d-none">
        <x-slot name="header1">
            <h4 class="mt-0 header-title">Tambah Data logs</h4>
        </x-slot>
        <x-slot name="body1">
            <table id="table_logs" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="text-center text-bold">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Nama</th>
                        <th>updated_at</th>
                    </tr>
                </thead>
            </table>
        </x-slot>
    </x-app-card>
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

        $('#table_logs').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('logs.index') }}",
                type: 'GET'
            },
            columnDefs: [{
                orderable: true,
                className: 'text-center',
                targets: [3]
            }],
            columns: [{
                data: 'description',
            }, {
                data: 'log_name',
            }, {
                data: 'attributes',
            }, {
                data: 'updated_at'
            }],
            order: [
                [0, 'asc']
            ]
        });
    });

</script>
@endsection
