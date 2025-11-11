<!-- resources/views/tugas/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
</head>
<body>
    <h1>Tambah Tugas</h1>

    <form action="{{ route('tugas.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" required></textarea>
        </div>

        <div>
            <label for="tanggal_tenggat">Tanggal Tenggat:</label>
            <input type="date" name="tanggal_tenggat" id="tanggal_tenggat" required>
        </div>

        <div>
            <label for="dibuat_oleh">Dibuat Oleh:</label>
            <select name="dibuat_oleh" id="dibuat_oleh" required>
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
