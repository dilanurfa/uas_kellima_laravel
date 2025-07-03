<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    // Tampilkan semua ruangan
    public function index()
    {
        $Ruangan = Ruangan::all();
        return view('Ruangan.index', compact('Ruangan'));
    }

    // Tampilkan form tambah ruangan
    public function create()
    {
        return view('Ruangan.create');
    }

    // Simpan ruangan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'harga'        => 'required|integer|min:0',
            'durasi'       => 'required|string|max:50',
            'deskripsi'    => 'required|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_ruangan.required' => 'Nama ruangan wajib diisi.',
            'harga.required'        => 'Harga wajib diisi.',
            'harga.integer'         => 'Harga harus berupa angka.',
            'durasi.required'       => 'Durasi wajib diisi.',
            'deskripsi.required'    => 'Deskripsi tidak boleh kosong.',
            'foto.required'         => 'Foto ruangan wajib diunggah.',
            'foto.image'            => 'File harus berupa gambar.',
            'foto.mimes'            => 'Foto hanya boleh JPG atau PNG.',
            'foto.max'              => 'Ukuran maksimal foto adalah 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('Ruangan', 'public');
        }

        Ruangan::create($validated);

        return redirect()->route('Ruangan.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $Ruangan = Ruangan::findOrFail($id);
        return view('Ruangan.edit', compact('ruangan'));
    }

    // Update data ruangan
    public function update(Request $request, $id)
    {
        $Ruangan = Ruangan::findOrFail($id);

        $validated = $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'harga'        => 'required|integer|min:0',
            'durasi'       => 'required|string|max:50',
            'deskripsi'    => 'required|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_ruangan.required' => 'Nama ruangan wajib diisi.',
            'harga.required'        => 'Harga wajib diisi.',
            'harga.integer'         => 'Harga harus berupa angka.',
            'durasi.required'       => 'Durasi wajib diisi.',
            'deskripsi.required'    => 'Deskripsi tidak boleh kosong.',
            'foto.image'            => 'File harus berupa gambar.',
            'foto.mimes'            => 'Foto hanya boleh JPG atau PNG.',
            'foto.max'              => 'Ukuran maksimal foto adalah 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($Ruangan->foto) {
                Storage::disk('public')->delete($Ruangan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('Ruangan', 'public');
        }

        $Ruangan->update($validated);

        return redirect()->route('Ruangan.index')->with('success', 'Ruangan berhasil diperbarui.');
    }

    // Hapus ruangan
    public function destroy($id)
    {
        $Ruangan = Ruangan::findOrFail($id);

        // Hapus foto
        if ($Ruangan->foto) {
            Storage::disk('public')->delete($Ruangan->foto);
        }

        $Ruangan->delete();

        return redirect()->route('Ruangan.index')->with('success', 'Ruangan berhasil dihapus.');
    }

// Tampilkan detail ruangan
public function show($id)
{
    $Ruangan = Ruangan::findOrFail($id);
    return view('Ruangan.show', compact('ruangan'));
}

// Tampilkan daftar ruangan untuk klien
public function daftarUntukKlien()
{
    $Ruangan = Ruangan::all();
    return view('klien.index', compact('Ruangan'));
}

}


