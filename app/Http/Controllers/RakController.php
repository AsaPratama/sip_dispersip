<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raks = Rak::paginate(10);
        return view('pages.rak.index', compact('raks'));
    }

//------------------------------------------------------------------------------------------------

    public function create()
    {
        return view('pages.rak.create');
    }

//------------------------------------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'nama_rak' => 'required|string|max:255',
            'lokasi_rak' => 'required|string|max:255',
        ]);

        $raks = Rak::create([
            'nama_rak' => $request->nama_rak,
            'lokasi_rak' => $request->lokasi_rak,

        ]);
        return redirect()->route('rak.index')->with('success', 'Data rak berhasil disimpan');
    }

//------------------------------------------------------------------------------------------------

    public function edit(string $id)
    {
        $raks = Rak::find($id);
        return view('pages.rak.edit', compact('raks'));
    }

//------------------------------------------------------------------------------------------------

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_rak' => 'required|string|max:255',
            'lokasi_rak' => 'required|string|max:255',
        ]);

        
        $raks = Rak::findOrFail($id);

        // Update data
        
        $raks->nama_rak = $request->nama_rak;
        $raks->lokasi_rak = $request->lokasi_rak;

        // Simpan perubahan
        $raks->save();
        return redirect()->route('rak.index')->with('success', 'Data rak berhasil diperbaharui');
    }

//------------------------------------------------------------------------------------------------

    public function destroy(string $id)
    {
        $raks = Rak::findOrFail($id);
        $raks->delete();
        return redirect()->route('rak.index')->with('success', 'Data rak berhasil dihapus');
    }

// UNUSED FUNCTION -------------------------------------------------------------------------------

    public function show(string $id)
    {
        //
    }
}
