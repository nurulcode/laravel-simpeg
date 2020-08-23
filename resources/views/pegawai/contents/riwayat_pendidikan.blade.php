<div class="table-responsive ">
    <table class="table table-striped table-bordered mb-0">
        <thead class="thead-light text-center">
            <tr>
                <th>Nama Sekolah</th>
                <th>Nomot, Tgl Ijazah</th>
                <th>Tingkat Pendidikan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai->sekolahs as $result)
            <tr>
                <td>{{ $result->nama_sekolah }} </td>
                <td>{{ $result->nomor }} - {{ $result->tgl_ijazah }}</td> </td>
                <td>{{ $result->tingkat }} - {{ $result->pendidikan->nama }}</td>
                <td class="text-center">
                    <div class="button-items">
                        <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('sekolah.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-info btn-sm waves-effect waves-light" href="{{ route('sekolah.show', $result->id) }}"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('sekolah.destroy', $result->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
