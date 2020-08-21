<div class="table-responsive ">
    <table class="table mb-0">
        <thead>
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
                @if($result->status == 3)
                    <tr>
                        <td>{{ $result->nik }}</td>
                        <td>{{ $result->nama_lengkap }}</td>
                        <td>{{ $result->tempat_lahir }}, <br> {{ $result->tanggal_lahir }}
                        </td>
                        <td>{{ $result->pendidikan->nama }}</td>
                        <td>{{ $result->status_string }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('keluargas.edit', $result->id) }}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('keluargas.show', $result->id) }}">Detail Action</a>
                                    <form action="{{ route('keluargas.destroy', $result->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="dropdown-item" onclick="return confirm('Are you sure?')">
                                            Delete Action
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
