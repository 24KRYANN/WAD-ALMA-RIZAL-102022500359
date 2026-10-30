<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 rounded shadow" style="max-width: 600px;">
        <h2>Tambah Pesanan Baru</h2>
        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label>Nama</label><input type="text" name="nama_pelanggan" class="form-control" required></div>
            <div class="mb-3"><label>No HP</label><input type="text" name="nomor_hp" class="form-control" required></div>
            <div class="mb-3"><label>Alamat</label><textarea name="alamat_lengkap" class="form-control" required></textarea></div>
            <div class="mb-3"><label>Paket</label>
                <select name="jenis_paket" class="form-control">
                    <option value="Kiloan">Kiloan</option>
                    <option value="Satuan">Satuan</option>
                    <option value="Express">Express</option>
                </select>
            </div>
            <div class="mb-3"><label>Kuantitas</label><input type="text" name="kuantitas" class="form-control" required></div>
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>