<!-- resources/views/tugas/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
</head>
<body>
    <h1>Daftar Tugas</h1>
    
    <a href="{{ route('tugas.create') }}">Tambah Tugas</a>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Tenggat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas as $t)
                <tr>
                    <td>{{ $t->judul }}</td>
                    <td>{{ $t->deskripsi }}</td>
                    <td>{{ $t->tanggal_tenggat }}</td>
                    <td>
                        <a href="{{ route('tugas.show', $t->id) }}">Detail</a>
                        <a href="{{ route('tugas.edit', $t->id) }}">Edit</a>
                        <form action="{{ route('tugas.destroy', $t->id) }}" method="POST" style="display:inline;">
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
