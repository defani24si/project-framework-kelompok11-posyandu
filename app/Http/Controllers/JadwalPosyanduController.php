<?php

namespace App\Http\Controllers;

use App\Models\JadwalPosyandu;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class JadwalPosyanduController extends Controller
{
    public function index(Request $request)
    {
        $query = JadwalPosyandu::with('posyandu');

        if ($request->filled('posyandu_id')) {
            $query->where('posyandu_id', $request->posyandu_id);
        }

        if ($request->filled('tanggal_dari')) {
            $query->where('tanggal', '>=', $request->tanggal_dari);
        }

        if ($request->filled('tanggal_sampai')) {
            $query->where('tanggal', '<=', $request->tanggal_sampai);
        }

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('tema', 'like', "%{$searchTerm}%")
                  ->orWhere('keterangan', 'like', "%{$searchTerm}%")
                  ->orWhereHas('posyandu', function($posyanduQuery) use ($searchTerm) {
                      $posyanduQuery->where('nama', 'like', "%{$searchTerm}%");
                  });
            });
        }

        $jadwals = $query->paginate(10)->withQueryString();
        $posyandus = Posyandu::all();

        return view('jadwal_posyandu.index', compact('jadwals', 'posyandus'));
    }

    public function create()
    {
        $posyandus = Posyandu::all();
        return view('jadwal_posyandu.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posyandu_id' => 'required|exists:posyandu,posyandu_id',
            'tanggal'     => 'required|date',
            'tema'        => 'required|string',
            'keterangan'  => 'nullable|string',
        ]);

        JadwalPosyandu::create($request->all());

        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jadwalPosyandu = JadwalPosyandu::with('posyandu')->findOrFail($id);
        return view('jadwal_posyandu.show', compact('jadwalPosyandu'));
    }

    public function edit($id)
    {
        $jadwalPosyandu = JadwalPosyandu::findOrFail($id);
        $posyandus = Posyandu::all();

        return view('jadwal_posyandu.edit', compact('jadwalPosyandu', 'posyandus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'posyandu_id' => 'required|exists:posyandu,posyandu_id',
            'tanggal'     => 'required|date',
            'tema'        => 'required|string',
            'keterangan'  => 'nullable|string',
        ]);

        $jadwalPosyandu = JadwalPosyandu::findOrFail($id);
        $jadwalPosyandu->update($request->all());

        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jadwalPosyandu = JadwalPosyandu::findOrFail($id);
        $jadwalPosyandu->delete();

        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil dihapus.');
    }
}
