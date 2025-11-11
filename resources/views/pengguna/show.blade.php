<!-- resources/views/pengguna/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
</head>
<body>
    <h1>Detail Pengguna</h1>

    <p><strong>Nama:</strong> {{ $pengguna->nama }}</p>
    <p><strong>Email:</strong> {{ $pengguna->email }}</p>
    <p><strong>Role:</strong> {{ $pengguna->role }}</p>
    
    <a href="{{ route('pengguna.index') }}">Kembali</a>
</body>
</html>
