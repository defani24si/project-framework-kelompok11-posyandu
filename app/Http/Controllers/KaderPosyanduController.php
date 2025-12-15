<?php

namespace App\Http\Controllers;

use App\Models\KaderPosyandu;
use App\Models\Posyandu;
use App\Models\Warga;
use Illuminate\Http\Request;

class KaderPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaderPosyandu = KaderPosyandu::with(['posyandu', 'warga'])->paginate(10);
        return view('kader-posyandu.index', compact('kaderPosyandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posyandu = Posyandu::all();
        $warga = Warga::all();
        return view('kader-posyandu.create', compact('posyandu', 'warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'posyandu_id' => 'required|exists:posyandu,posyandu_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'peran' => 'required|string|max:255',
            'mulai_tugas' => 'required|date',
            'akhir_tugas' => 'nullable|date|after:mulai_tugas',
        ]);

        KaderPosyandu::create($request->all());

        return redirect()->route('kader-posyandu.index')
            ->with('success', 'Kader Posyandu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KaderPosyandu $kaderPosyandu)
    {
        $kaderPosyandu->load(['posyandu', 'warga']);
        return view('kader-posyandu.show', compact('kaderPosyandu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KaderPosyandu $kaderPosyandu)
    {
        $posyandu = Posyandu::all();
        $warga = Warga::all();
        return view('kader-posyandu.edit', compact('kaderPosyandu', 'posyandu', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KaderPosyandu $kaderPosyandu)
    {
        $request->validate([
            'posyandu_id' => 'required|exists:posyandu,posyandu_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'peran' => 'required|string|max:255',
            'mulai_tugas' => 'required|date',
            'akhir_tugas' => 'nullable|date|after:mulai_tugas',
        ]);

        $kaderPosyandu->update($request->all());

        return redirect()->route('kader-posyandu.index')
            ->with('success', 'Kader Posyandu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KaderPosyandu $kaderPosyandu)
    {
        $kaderPosyandu->delete();

        return redirect()->route('kader-posyandu.index')
            ->with('success', 'Kader Posyandu berhasil dihapus.');
    }
}