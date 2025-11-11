<!-- resources/views/keanggotaan_kelas/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keanggotaan Kelas</title>
</head>
<body>
    <h1>Daftar Keanggotaan Kelas</h1>

    <a href="{{ route('keanggotaan_kelas.create') }}">Tambah Keanggotaan</a>

    <table>
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keanggotaanKelas as $keanggotaan)
                <tr>
                    <td>{{ $keanggotaan->kelas->nama_kelas }}</td>
                    <td>{{ $keanggotaan->siswa->nama }}</td>
                    <td>
                        <a href="{{ route('keanggotaan_kelas.show', $keanggotaan->id) }}">Detail</a>
                        <a href="{{ route('keanggotaan_kelas.edit', $keanggotaan->id) }}">Edit</a>
                        <form action="{{ route('keanggotaan_kelas.destroy', $keanggotaan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
