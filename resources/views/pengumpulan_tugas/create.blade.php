<!-- resources/views/pengumpulan_tugas/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumpulan Tugas</title>
</head>
<body>
    <h1>Tambah Pengumpulan Tugas</h1>

    <form action="{{ route('pengumpulan_tugas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="tugas_id">Tugas:</label>
            <select name="tugas_id" id="tugas_id" required>
                @foreach($tugas as $t)
                    <option value="{{ $t->id }}">{{ $t->judul }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="pengguna_id">Siswa:</label>
            <select name="pengguna_id" id="pengguna_id" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="file_path">File Tugas:</label>
            <input type="file" name="file_path" id="file_path" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
