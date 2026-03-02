<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['siswa', 'buku'])->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $bukus = Buku::where('stok', '>', 0)->get();
        return view('peminjaman.create', compact('siswas', 'bukus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after:tanggal_pinjam',
        ]);

        $buku = Buku::find($request->buku_id);
        if ($buku->stok <= 0) {
            return back()->with('error', 'Buku tidak tersedia');
        }

        $buku->decrement('stok');

        Peminjaman::create($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['siswa', 'buku']);
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $siswas = Siswa::all();
        $bukus = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'siswas', 'bukus'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'tanggal_jatuh_tempo' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat',
        ]);

        if ($request->status == 'dikembalikan' && !$peminjaman->tanggal_kembali) {
            $peminjaman->buku->increment('stok');
        }

        $peminjaman->update($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dipinjam') {
            $peminjaman->buku->increment('stok');
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
