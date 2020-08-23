<div class="table-responsive ">
    <table class="table table-striped table-bordered mb-0">
        <thead class="thead-light text-center">
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Pendidikan</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai->keluargas as $result)
                @if($result->status == 1)
                    <tr>
                        <td>{{ $result->nik }}</td>
                        <td>{{ $result->nama_lengkap }}</td>
                        <td>{{ $result->tempat_lahir }}, <br> {{ $result->tanggal_lahir }}
                        </td>
                        <td>{{ $result->pendidikan->nama }}</td>
                        <td>{{ $result->status_string }}</td>
                        <td class="text-center">
                            <div class="button-items">
                                <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('keluarga.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-info btn-sm waves-effect waves-light" href="{{ route('keluarga.show', $result->id) }}"><i class="fas fa-eye"></i></a>
                                <form action="{{ route('keluarga.destroy', $result->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
