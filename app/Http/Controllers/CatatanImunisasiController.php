<?php

namespace App\Http\Controllers;

use App\Models\CatatanImunisasi;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatatanImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatanImunisasi = CatatanImunisasi::with('warga')->paginate(10);
        return view('catatan-imunisasi.index', compact('catatanImunisasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all();
        return view('catatan-imunisasi.create', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'jenis_vaksin' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'nakes' => 'required|string|max:255',
            'kartu_imunisasi_scan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('kartu_imunisasi_scan')) {
            $file = $request->file('kartu_imunisasi_scan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('catatan_imunisasi', $filename, 'public');
            $data['kartu_imunisasi_scan'] = $path;
        }

        CatatanImunisasi::create($data);

        return redirect()->route('catatan-imunisasi.index')
            ->with('success', 'Catatan Imunisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatatanImunisasi $catatanImunisasi)
    {
        $catatanImunisasi->load('warga');
        return view('catatan-imunisasi.show', compact('catatanImunisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanImunisasi $catatanImunisasi)
    {
        $warga = Warga::all();
        return view('catatan-imunisasi.edit', compact('catatanImunisasi', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatatanImunisasi $catatanImunisasi)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'jenis_vaksin' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'nakes' => 'required|string|max:255',
            'kartu_imunisasi_scan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('kartu_imunisasi_scan')) {
            // Delete old file if exists
            if ($catatanImunisasi->kartu_imunisasi_scan) {
                Storage::disk('public')->delete($catatanImunisasi->kartu_imunisasi_scan);
            }

            $file = $request->file('kartu_imunisasi_scan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('catatan_imunisasi', $filename, 'public');
            $data['kartu_imunisasi_scan'] = $path;
        }

        $catatanImunisasi->update($data);

        return redirect()->route('catatan-imunisasi.index')
            ->with('success', 'Catatan Imunisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatatanImunisasi $catatanImunisasi)
    {
        // Delete file if exists
        if ($catatanImunisasi->kartu_imunisasi_scan) {
            Storage::disk('public')->delete($catatanImunisasi->kartu_imunisasi_scan);
        }

        $catatanImunisasi->delete();

        return redirect()->route('catatan-imunisasi.index')
            ->with('success', 'Catatan Imunisasi berhasil dihapus.');
    }
}