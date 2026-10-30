<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 rounded shadow" style="max-width: 600px;">
        <h2>Edit Data Pesanan</h2>
        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label>Nama</label><input type="text" name="nama_pelanggan" value="{{ $pesanan->nama_pelanggan }}" class="form-control" required></div>
            <div class="mb-3"><label>No HP</label><input type="text" name="nomor_hp" value="{{ $pesanan->nomor_hp }}" class="form-control" required></div>
            <div class="mb-3"><label>Alamat</label><textarea name="alamat_lengkap" class="form-control" required>{{ $pesanan->alamat_lengkap }}</textarea></div>
            <div class="mb-3"><label>Paket</label>
                <select name="jenis_paket" class="form-control">
                    <option value="Kiloan" {{ $pesanan->jenis_paket == 'Kiloan' ? 'selected' : '' }}>Kiloan</option>
                    <option value="Satuan" {{ $pesanan->jenis_paket == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                    <option value="Express" {{ $pesanan->jenis_paket == 'Express' ? 'selected' : '' }}>Express</option>
                </select>
            </div>
            <div class="mb-3"><label>Kuantitas</label><input type="text" name="kuantitas" value="{{ $pesanan->kuantitas }}" class="form-control" required></div>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>