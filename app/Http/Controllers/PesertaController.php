<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Tampilkan daftar peserta.
     */
    public function index()
    {
        $pesertas = Peserta::with('skema')->latest()->paginate(10);
        return view('peserta.index', compact('pesertas'));
    }

    /**
     * Tampilkan form tambah peserta.
     */
    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    /**
     * Simpan data peserta baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:pesertas,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email',
            'telepon' => 'required|string|max:15',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail peserta tertentu (Show).
     */
    public function show(Peserta $peserta)
    {
        return view('peserta.show', compact('peserta'));
    }

    /**
     * Tampilkan form edit peserta.
     */
    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    /**
     * Perbarui data peserta di database.
     */
    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:pesertas,nik,' . $peserta->id,
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email,' . $peserta->id,
            'telepon' => 'required|string|max:15',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    /**
     * Hapus data peserta dari database.
     */
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus!');
    }
}