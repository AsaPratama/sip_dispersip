<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koran;
use App\Models\Rak;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    public function index()
{
    $korans = Koran::with('rak')->paginate(10);

    // Data untuk grafik: jumlah koleksi berdasarkan tahun created_at
    $dataForChart = Koran::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->pluck('total', 'year')
        ->toArray(); // Konversi ke array untuk Chart.js

    return view('pages.app.dashboard', compact('korans', 'dataForChart'));
}

    

//------------------------------------------------------------------------------------------------    

    public function create()
    {
        $raks = Rak::all();
        return view('pages.koleksi.create', compact('raks'));
    }

//------------------------------------------------------------------------------------------------

    public function store(Request $request)
    {
        // Validasi input lainnya
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'kondisi' => 'required|string',
            'rak_id' => 'required|integer',

            // nama field baru
            'jumlah_eksemplar' => 'required|integer',
            //---

            'jenis_koleksi' => 'required|string|max:255',

            // field baru
            'tempat_terbit' => 'required|string|max:255',
            'dimensi_p' => 'required|integer',
            'dimensi_l' => 'required|integer',
            'dimensi_t' => 'required|integer',
            'keterangan' => 'required|string|max:255',
            //---

            'pdf_path' => 'nullable|file|mimes:pdf|max:20240', 
            'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5024', // Validasi gambar
        ]);
    
        // Inisialisasi data koleksi
        $koleksi = new Koran();
        $koleksi->judul = $request->judul;
        $koleksi->penulis = $request->penulis;
        $koleksi->penerbit = $request->penerbit;
        $koleksi->tahun_terbit = $request->tahun_terbit;
        $koleksi->jumlah_halaman = $request->jumlah_halaman;
        $koleksi->kondisi = $request->kondisi;
        $koleksi->rak_id = $request->rak_id;

        // edit nama field
        $koleksi->jumlah_eksemplar = $request->jumlah_eksemplar;
        //---

        $koleksi->jenis_koleksi = $request->jenis_koleksi;

        // field baru
        $koleksi->tempat_terbit = $request->tempat_terbit;
        $koleksi->dimensi_p = $request->dimensi_p;
        $koleksi->dimensi_l = $request->dimensi_l;
        $koleksi->dimensi_t = $request->dimensi_t;
        $koleksi->keterangan = $request->keterangan;
        //---

        // Cek apakah ada file PDF yang diunggah
        if ($request->hasFile('pdf_path')) {
            $pdfFile = $request->file('pdf_path');
            $namaPdf = time() . '_' . $pdfFile->getClientOriginalName();
            
            // Pindahkan file PDF ke folder public/pdf
            $pdfFile->move(public_path('pdf'), $namaPdf);
            $koleksi->pdf_path = 'pdf/' . $namaPdf;
        }
    
        // Cek apakah ada gambar sampul yang diunggah
        if ($request->hasFile('cover_path')) {
            $coverImage = $request->file('cover_path');
            $namaImage = time() . '_' . $coverImage->getClientOriginalName();
            
            // Pindahkan gambar ke folder public/images
            $coverImage->move(public_path('cover'), $namaImage);
            $koleksi->cover_path = 'cover/' . $namaImage; // Simpan path relatif ke database
        }
    
        // Simpan data koleksi ke database
        $koleksi->save();
    
        return redirect()->route('home')->with('success', 'Koleksi berhasil ditambahkan.');
    }
    
//------------------------------------------------------------------------------------------------

    public function show(string $id)
    {
        $koran = Koran::with('rak')->findOrFail($id);
        return view('pages.koleksi.detail', compact('koran'));
    }

//------------------------------------------------------------------------------------------------

    public function edit(string $id)
    {
       // $korans = Koran::find($id);
        $koran = Koran::with('rak')->where('kode_koran', $id)->paginate();
        $raks = Rak::all();
        
        //return $nama_koran;
        return view('pages.koleksi.edit', compact('koran', 'raks'));
    }

//------------------------------------------------------------------------------------------------

     public function update(Request $request, $id)
     {
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'jumlah_halaman' => 'required|integer',
        'kondisi' => 'required|string',
        'rak_id' => 'required|integer',

        // Nama field baru
        'jumlah_eksemplar' => 'required|integer',
        //---

        'jenis_koleksi' => 'required|string|max:255',

        // Field baru
        'tempat_terbit' => 'required|string|max:255',
        'dimensi_p' => 'required|integer',
        'dimensi_l' => 'required|integer',
        'dimensi_t' => 'required|integer',
        'keterangan' => 'required|string|max:255',
        //---

        'pdf_path' => 'nullable|file|mimes:pdf|max:20240',
        'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5024', // Validasi gambar
    ]);

    // Validasi file PDF hanya jika ada file yang diunggah
    if ($request->hasFile('pdf_path')) {
        $request->validate([
            'pdf_path' => 'nullable|file|mimes:pdf',
        ]);
    }

    // Temukan data berdasarkan kode_koran
    $koleksi = Koran::where('kode_koran', $id)->firstOrFail();

    // Update data
    $koleksi->judul = $request->judul;
    $koleksi->penulis = $request->penulis;
    $koleksi->penerbit = $request->penerbit;
    $koleksi->tahun_terbit = $request->tahun_terbit;
    $koleksi->jumlah_halaman = $request->jumlah_halaman;
    $koleksi->kondisi = $request->kondisi;
    $koleksi->rak_id = $request->rak_id;

    // Nama field baru
    $koleksi->jumlah_eksemplar = $request->jumlah_eksemplar;
    //---

    $koleksi->jenis_koleksi = $request->jenis_koleksi;

    // Field baru
    $koleksi->tempat_terbit = $request->tempat_terbit;
    $koleksi->dimensi_p = $request->dimensi_p;
    $koleksi->dimensi_l = $request->dimensi_l;
    $koleksi->dimensi_t = $request->dimensi_t;
    $koleksi->keterangan = $request->keterangan;
    //---

    // Update PDF jika ada file baru yang diunggah
    if ($request->hasFile('pdf_path')) {
        // Hapus file PDF lama jika ada
        if ($koleksi->pdf_path && file_exists(public_path($koleksi->pdf_path))) {
            unlink(public_path($koleksi->pdf_path));
        }

        $pdfFile = $request->file('pdf_path');
        $namaPdf = time() . '_' . $pdfFile->getClientOriginalName();
        $pdfFile->move(public_path('pdf'), $namaPdf);
        $koleksi->pdf_path = 'pdf/' . $namaPdf;
    }

    // Update gambar cover jika ada file baru yang diunggah
    if ($request->hasFile('cover_path')) {
        // Hapus gambar cover lama jika ada
        if ($koleksi->cover_path && file_exists(public_path($koleksi->cover_path))) {
            unlink(public_path($koleksi->cover_path));
        }

        $coverImage = $request->file('cover_path');
        $namaImage = time() . '_' . $coverImage->getClientOriginalName();
        $coverImage->move(public_path('cover'), $namaImage);
        $koleksi->cover_path = 'cover/' . $namaImage;
    }

    // Simpan perubahan ke database
    $koleksi->save();

    return redirect()->route('koleksi.index')->with('success', 'Koleksi berhasil diperbarui.');
}


    
//------------------------------------------------------------------------------------------------
     
    public function destroy($id)
    {
        $koleksi = Koran::findOrFail($id);
    
        // Hapus file PDF jika ada
        if ($koleksi->pdf_path && file_exists(public_path($koleksi->pdf_path))) {
            unlink(public_path($koleksi->pdf_path));
        }
    
        // Hapus file cover image jika ada
        if ($koleksi->cover_path && file_exists(public_path($koleksi->cover_path))) {
            unlink(public_path($koleksi->cover_path));
        }
    
        // Hapus data koleksi dari database
        $koleksi->delete();
    
        return redirect()->route('home')->with('success', 'Koleksi berhasil dihapus.');
    }
    
    
}
