<?php

namespace App\Http\Controllers;

use App\Models\LayananPosyandu;
use App\Models\JadwalPosyandu;
use App\Models\Warga;
use Illuminate\Http\Request;

class LayananPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananPosyandu = LayananPosyandu::with(['jadwal.posyandu', 'warga'])->paginate(10);
        return view('layanan-posyandu.index', compact('layananPosyandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = JadwalPosyandu::with('posyandu')->get();
        $warga = Warga::all();
        return view('layanan-posyandu.create', compact('jadwal', 'warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal_posyandu,jadwal_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'berat' => 'nullable|numeric|min:0',
            'tinggi' => 'nullable|numeric|min:0',
            'vitamin' => 'nullable|string|max:255',
            'konseling' => 'nullable|string',
        ]);

        LayananPosyandu::create($request->all());

        return redirect()->route('layanan-posyandu.index')
            ->with('success', 'Layanan Posyandu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LayananPosyandu $layananPosyandu)
    {
        $layananPosyandu->load(['jadwal.posyandu', 'warga']);
        return view('layanan-posyandu.show', compact('layananPosyandu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LayananPosyandu $layananPosyandu)
    {
        $jadwal = JadwalPosyandu::with('posyandu')->get();
        $warga = Warga::all();
        return view('layanan-posyandu.edit', compact('layananPosyandu', 'jadwal', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LayananPosyandu $layananPosyandu)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal_posyandu,jadwal_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'berat' => 'nullable|numeric|min:0',
            'tinggi' => 'nullable|numeric|min:0',
            'vitamin' => 'nullable|string|max:255',
            'konseling' => 'nullable|string',
        ]);

        $layananPosyandu->update($request->all());

        return redirect()->route('layanan-posyandu.index')
            ->with('success', 'Layanan Posyandu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananPosyandu $layananPosyandu)
    {
        $layananPosyandu->delete();

        return redirect()->route('layanan-posyandu.index')
            ->with('success', 'Layanan Posyandu berhasil dihapus.');
    }
}