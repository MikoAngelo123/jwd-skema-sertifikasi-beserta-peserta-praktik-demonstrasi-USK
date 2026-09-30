<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    /**
     * Tampilkan daftar skema sertifikasi.
     */
    public function index()
    {
        $skemas = Skema::latest()->paginate(10);
        return view('skema.index', compact('skemas'));
    }

    /**
     * Tampilkan form tambah skema.
     */
    public function create()
    {
        return view('skema.create');
    }

    /**
     * Simpan data skema baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
        ], [
            'kode_skema.required' => 'Kode skema wajib diisi.',
            'kode_skema.unique'   => 'Kode skema sudah terdaftar.',
            'nama_skema.required' => 'Nama skema wajib diisi.',
            'jenis.required'      => 'Jenis skema wajib dipilih/diisi.',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail skema (opsional).
     */
    public function show(Skema $skema)
    {
        return view('skema.show', compact('skema'));
    }

    /**
     * Tampilkan form edit skema.
     */
    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    /**
     * Perbarui data skema di database.
     */
    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
        ]);

        $skema->update($request->all());

        return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil diperbarui.');
    }

    /**
     * Hapus data skema dari database.
     */
    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Data skema sertifikasi berhasil dihapus.');
    }
}