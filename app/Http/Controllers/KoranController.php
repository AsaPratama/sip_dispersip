<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koran;


class KoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Koran::with('rak'); // Load relasi rak

        if ($request->has('search')) {
            $search = $request->input('search');

            // Pencarian berdasarkan judul, penulis, dan lokasi rak
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('penulis', 'LIKE', "%{$search}%")
                    ->orWhereHas('rak', function ($query) use ($search) {
                        $query->where('lokasi_rak', 'LIKE', "%{$search}%");
                    });
            });
        }
        $korans = $query->get();
        return view('pages.dashboard.cari', compact('korans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $koran = Koran::with('rak')->findOrFail($id);
        //$koran = Koran::find($id);
        return view('pages.dashboard.detail', compact('koran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
