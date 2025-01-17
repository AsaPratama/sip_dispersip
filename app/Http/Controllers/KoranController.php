<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koran;


class KoranController extends Controller
{
   
    public function index(Request $request)
    {
        $query = Koran::with('rak'); // Load relasi rak

        if ($request->has('search')) {
            $search = $request->input('search');

            // Pencarian berdasarkan judul, penulis, dan lokasi rak
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('penulis', 'LIKE', "%{$search}%");
            });
        }
        $korans = $query->get();
        return view('pages.dashboard.cari', compact('korans'));
    }

//------------------------------------------------------------------------------------------------    
  
    public function show(string $id)
    {
        $koran = Koran::with('rak')->findOrFail($id);
        //$koran = Koran::find($id);
        return view('pages.dashboard.detail', compact('koran'));
    }

// UNUSED FUNCTION -------------------------------------------------------------------------------
    public function edit(string $id)
    {
      
    }


    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
    }
    

}
