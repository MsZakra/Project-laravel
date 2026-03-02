<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // List semua mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // Show form create
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Store ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'ipk' => 'required|numeric|min:0|max:4',
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // Show detail mahasiswa
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // Show form edit
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Update data
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'ipk' => 'required|numeric|min:0|max:4',
        ]);

        $mahasiswa->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui');
    }

    // Delete mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
