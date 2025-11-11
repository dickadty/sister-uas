<!-- resources/views/pengumpulan_tugas/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengumpulan Tugas</title>
</head>
<body>
    <h1>Daftar Pengumpulan Tugas</h1>
    
    <a href="{{ route('pengumpulan_tugas.create') }}">Tambah Pengumpulan Tugas</a>

    <table>
        <thead>
            <tr>
                <th>Tugas</th>
                <th>Siswa</th>
                <th>File</th>
                <th>Nilai</th>
                <th>Feedback</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengumpulanTugas as $pengumpulan)
                <tr>
                    <td>{{ $pengumpulan->tugas->judul }}</td>
                    <td>{{ $pengumpulan->siswa->nama }}</td>
                    <td><a href="{{ asset('storage/' . $pengumpulan->file_path) }}">Lihat File</a></td>
                    <td>{{ $pengumpulan->nilai }}</td>
                    <td>{{ $pengumpulan->feedback }}</td>
                    <td>
                        <a href="{{ route('pengumpulan_tugas.show', $pengumpulan->id) }}">Detail</a>
                        <a href="{{ route('pengumpulan_tugas.edit', $pengumpulan->id) }}">Edit</a>
                        <form action="{{ route('pengumpulan_tugas.destroy', $pengumpulan->id) }}" method="POST" style="display:inline;">
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
