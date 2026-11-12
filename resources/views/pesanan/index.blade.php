<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Pesanan FreshLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 rounded shadow">

        <!-- BAGIAN HEADER: NAMA, ROLE & LOGOUT -->
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <span>Login sebagai: <b>{{ auth()->user()->name }}</b> (Role: <span class="text-uppercase">{{ auth()->user()->role }}</span>)</span>
            
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Kuantitas</th>
                    <th>Aksi</th>
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
                        
                        <!-- TOMBOL HAPUS CUMA BUAT ADMIN -->
                        @if (auth()->user()->role === 'admin')
                        <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>