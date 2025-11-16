<?php
namespace App\Http\Controllers;

use App\Models\JadwalPosyandu;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class JadwalPosyanduController extends Controller
{
    public function index()
    {
        $jadwals = JadwalPosyandu::with('posyandu')->paginate(10); // tampilkan 10 per halaman
        return view('jadwal_posyandu.index', compact('jadwals'));
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
        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(JadwalPosyandu $jadwalPosyandu)
    {
        $posyandus = Posyandu::all();
        return view('jadwal_posyandu.edit', compact('jadwalPosyandu', 'posyandus'));
    }

    public function update(Request $request, JadwalPosyandu $jadwalPosyandu)
    {
        $request->validate([
'posyandu_id' => 'required|exists:posyandu,posyandu_id',
            'tanggal'     => 'required|date',
            'tema'        => 'required|string',
            'keterangan'  => 'nullable|string',
        ]);

        $jadwalPosyandu->update($request->all());
        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(JadwalPosyandu $jadwalPosyandu)
    {
        $jadwalPosyandu->delete();
        return redirect()->route('jadwal_posyandu.index')->with('success', 'Data berhasil dihapus.');
    }
}
