<!-- resources/views/pengumpulan_tugas/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengumpulan Tugas</title>
</head>

<body>
    <h1>Detail Pengumpulan Tugas</h1>

    <p><strong>Tugas:</strong> {{ $pengumpulanTugas->tugas->judul }}</p>
    <p><strong>Siswa:</strong> {{ $pengumpulanTugas->siswa->nama }}</p>
    <p><strong>File Tugas:</strong> <a href="{{ asset('storage/' . $pengumpulanTugas->file_path) }}" target="_blank">Lihat
            File</a></p>
    <p><strong>Nilai:</strong> {{ $pengumpulanTugas->nilai }}</p>
    <p><strong>Feedback:</strong> {{ $pengumpulanTugas->feedback }}</p>

    <a href="{{ route('pengumpulan_tugas.index') }}">Kembali</a>
</body>

</html>
