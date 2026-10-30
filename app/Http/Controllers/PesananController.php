<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // READ: Menampilkan semua data pesanan
    public function index()
    {
        $pesanan = Pesanan::orderBy('id', 'DESC')->get();
        return view('pesanan.index', compact('pesanan'));
    }

    // CREATE: Menampilkan halaman form tambah pesanan
    public function create()
    {
        return view('pesanan.create');
    }

    // CREATE (Proses): Menyimpan data baru ke database
    public function store(Request $request)
    {
        Pesanan::create($request->all());
        return redirect('/pesanan')->with('success', 'Data pesanan berhasil ditambahkan!');
    }

    // UPDATE: Menampilkan form edit berdasarkan ID
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.edit', compact('pesanan'));
    }

    // UPDATE (Proses): Menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($request->all());
        return redirect('/pesanan')->with('success', 'Data pesanan berhasil diperbarui!');
    }

    // DELETE: Menghapus data dari database
    public function destroy($id)
    {
        Pesanan::destroy($id);
        return redirect('/pesanan')->with('success', 'Data pesanan berhasil dihapus!');
    }
}