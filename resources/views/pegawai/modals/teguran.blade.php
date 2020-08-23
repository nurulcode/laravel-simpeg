<div class="modal fade teguran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Kep Teguran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive ">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>Jenis</th>
                                <th>Nomor</th>
                                <th>Tanggal Surat</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai->tegurans as $result)
                            <tr>
                                <td>{{ $result->jenis }}</td>
                                <td>{{ $result->nomor }}</td>
                                <td>{{ $result->tgl_surat }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="{{ asset('storage/' . $result->file_surat) }}" target="_blank">Lihat Surat</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('teguran.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('teguran.destroy', $result->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
