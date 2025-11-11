<!-- resources/views/keanggotaan_kelas/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Keanggotaan Kelas</title>
</head>
<body>
    <h1>Tambah Keanggotaan Kelas</h1>

    <form action="{{ route('keanggotaan_kelas.store') }}" method="POST">
        @csrf
        <div>
            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
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

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
