<div class="table-responsive ">
    <table class="table mb-0">
        <thead>
            <tr>
                <th>Nama Sekolah</th>
                <th>Tingkat Pendidikan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai->sekolahs as $result)
            <tr>
                <td>{{ $result->nama_sekolah }} </td>
                <td>{{ $result->tingkat }} - {{ $result->pendidikan->nama }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('sekolahs.edit', $result->id) }}">Edit</a>
                            <form action="{{ route('sekolahs.destroy', $result->id) }}" method="post">
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
            @endforeach
        </tbody>
    </table>
</div>
