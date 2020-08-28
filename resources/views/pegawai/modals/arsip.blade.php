<div class="modal fade arsip" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Kep arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive ">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>Nama Berkas</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai->arsips as $result)
                            <tr>
                                <td>{{ $result->nama }}</td>
                                <td>{{ $result->jenis }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="{{ asset('storage/' . $result->file_arsip) }}" target="_blank">Lihat Surat</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('arsip.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('arsip.destroy', $result->id) }}" method="post">
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
