<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($santri as $s)
            <tr>
                <td>{{ $s->nama }}</td>
                <td>{{ date('d M Y', strtotime($s->tgl_lahir)) }}</td>
                <td>{{ $s->lahir }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->no_hp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
