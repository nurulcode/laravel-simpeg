<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Kelamin</th>
            <th>Agama</th>
            <th>Pernikahan</th>
            <th>Status Kepegawian</th>
            <th>Telfon</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($results as $result)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $result->nip }}</td>
            <td>{{ $result->nama_lengkap }}</td>
            <td>{{ $result->tempat_lahir }}, {{ $result->tanggal_lahir }} </td>

            <td>{{ $result->jenis_kelamin }}</td>
            <td>{{ $result->agama }}</td>
            <td>{{ $result->pernikahan }}</td>
            <td>{{ $result->kepegawaian }}</td>

            <td>{{ $result->telfon }}</td>
            <td>{{ $result->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
