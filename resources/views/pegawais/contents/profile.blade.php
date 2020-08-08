<div class="table-responsive ">
    <table class="table mb-0">
        <tbody>
            <tr>
                <th scope="row">Nip</th>
                <td>: {{ $pegawai->nip }} </td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>: {{ $pegawai->email }} </td>
            </tr>
            <tr>
                <th scope="row">Nama Lengkap</th>
                <td>: {{ $pegawai->nama_lengkap }} </td>
            </tr>
            <tr>
                <th scope="row">Tempat, Tanggal Lahir</th>
                <td>: {{ $pegawai->tempat_lahir }} - {{ $pegawai->tanggal_lahir }} </td>
            </tr>
            <tr>
                <th scope="row">Gol</th>
                <td>: {{ Str::title($pegawai->golongan_darah) }} </td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td>: {{ Str::title($pegawai->agama) }} </td>
            </tr>
            <tr>
                <th scope="row">Pernikahan</th>
                <td>: {{ Str::title($pegawai->pernikahan) }} </td>
            </tr>
            <tr>
                <th scope="row">Kepegawaian</th>
                <td>:
                    {{ $pegawai->kepegawaian == 'PTT' ? 'Pekerja Tidak Tetap' : 'Pegawai Negri Sipil' }}
                </td>
            </tr>
            <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:
                    {{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
            </tr>
            <tr>
                <th scope="row">Telfon</th>
                <td>: {{ $pegawai->telfon }}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>: {{ $pegawai->alamat }} </td>
            </tr>
            <tr>
                <th scope="row">Unit Kerja</th>
                <td>: {{ $pegawai->unit->nama }} </td>
            </tr>
        </tbody>
    </table>
</div>
