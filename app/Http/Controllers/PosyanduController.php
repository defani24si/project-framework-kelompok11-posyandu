<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
     public function index(Request $request)
{
    $query = Posyandu::query();
    
    if ($request->filled('rt')) {
        $query->where('rt', $request->rt);
    }
    
    if ($request->filled('rw')) {
        $query->where('rw', $request->rw);
    }
    
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('nama', 'like', "%{$searchTerm}%")
              ->orWhere('alamat', 'like', "%{$searchTerm}%");
        });
    }
    
    $posyandus = $query->paginate(10)->withQueryString();
    
    return view('posyandu.index', compact('posyandus'));
}  

    public function create()
    {
        return view('posyandu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kontak' => 'required|string|max:255',
        ]);

        Posyandu::create($request->all());

        return redirect()->route('posyandu.index')
            ->with('success', 'Posyandu berhasil ditambahkan.');
    }

    public function show($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        return view('posyandu.show', compact('posyandu'));
    }

    public function edit($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        return view('posyandu.edit', compact('posyandu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kontak' => 'required|string|max:255',
        ]);

        $posyandu = Posyandu::findOrFail($id);
        $posyandu->update($request->all());

        return redirect()->route('posyandu.index')
            ->with('success', 'Posyandu berhasil diupdate.');
    }

    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();

        return redirect()->route('posyandu.index')
            ->with('success', 'Posyandu berhasil dihapus.');
    }
}