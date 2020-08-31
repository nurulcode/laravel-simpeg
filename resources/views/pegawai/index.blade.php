@extends('layouts.global')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('pegawai.create') }}" class="btn btn-primary waves-light mb-3">
                        Tambah Data
                    </a>
                </div>
                <table id="table_pegawai" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="text-center text-bold">
                        <tr>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
            @include('pegawai.modals.delete')
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
        $('#table_pegawai').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pegawai.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'foto',
                }, {
                    data: 'nip',
                }, {
                    data: 'nama_lengkap',
                }, {
                    data: 'ttl',
                }, {
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
        $('#delete-pegawai-modal').modal('show');
    });

    //Delete Data
    $('#delete-pegawai-button').click(function () {
        $.ajax({

            url: "pegawai/" + dataId,
            type: 'delete',
            beforeSend: function () {
                $('#delete-pegawai-button').text('Loading ...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#delete-pegawai-modal').modal('hide');
                    $('#delete-pegawai-button').text('Hapus');
                     // Reset Datatable
                    let oTable = $('#table_pegawai').dataTable();
                    oTable.fnDraw(false);
                });
            }
        })
    });

</script>
@endsection
