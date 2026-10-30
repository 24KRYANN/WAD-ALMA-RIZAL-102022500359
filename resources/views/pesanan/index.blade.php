<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Pesanan - FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 rounded shadow">
        <div class="d-flex justify-content-between mb-3">
            <h2>Data Pesanan Masuk (Laravel)</h2>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">+ Tambah Pesanan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Nama Pelanggan</th><th>No HP</th><th>Alamat</th><th>Paket</th><th>Kuantitas</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->nomor_hp }}</td>
                    <td>{{ $p->alamat_lengkap }}</td>
                    <td>{{ $p->jenis_paket }}</td>
                    <td>{{ $p->kuantitas }}</td>
                    <td>
                        <a href="{{ route('pesanan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>