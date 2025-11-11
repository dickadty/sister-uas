<!-- resources/views/pengumpulan_tugas/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumpulan Tugas</title>
</head>

<body>
    <h1>Edit Pengumpulan Tugas</h1>

    <form action="{{ route('pengumpulan_tugas.update', $pengumpulanTugas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="nilai">Nilai:</label>
            <input type="number" name="nilai" id="nilai" value="{{ $pengumpulanTugas->nilai }}" required>
        </div>

        <div>
            <label for="feedback">Feedback:</label>
            <textarea name="feedback" id="feedback" required>{{ $pengumpulanTugas->feedback }}</textarea>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
