@extends('layouts.app')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Arsip dan Koleksi</h1>  
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Arsip dan Koleksi</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{route('koleksi.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="" name="judul" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" id="" name="penulis" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control" id="" name="penerbit" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input type="number" min="1600" class="form-control" id="" name="tahun_terbit" value="" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_halaman">Jumlah Halaman</label>
                                        <input type="number" min="1" max="10000" class="form-control" id="" name="jumlah_halaman" value="" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi">Kondisi</label>
                                        <select id="" name="kondisi" class="form-control">
                                            <option value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                            <option value="sedang diperbaiki">Sedang diperbaiki</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi">Rak</label>
                                        <select id="rak_id" name="rak_id" class="form-control">
                                            <!-- Opsi default untuk mengizinkan rak null -->
                                            <option value="0" selected>Pilih nanti</option>
                                            
                                            @foreach ($raks as $rak)
                                            <option value="{{ $rak->id }}">{{ $rak->nama_rak }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_buku">Jumlah Eksemplar</label>
                                        <input type="number" min="1" max="1000" class="form-control" id="" name="jumlah_eksemplar" value="" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_koleksi">Jenis Koleksi</label>
                                        <select id="" name="jenis_koleksi" class="form-control">
                                            <option value="Naskah Kuno">Naskah Kuno</option>
                                            <option value="Majalah">Majalah</option>
                                            <option value="Buku">Buku</option>
                                            <option value="Koran">Koran</option>
                                            <option value="Skripsi">Skripsi</option>
                                            <option value="Karya ilmiah">Karya ilmiah</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tempat_terbit">Tempat Terbit</label>
                                        <input type="text" class="form-control" id="" name="tempat_terbit" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="dimensi_p">Dimensi Panjang (cm)</label>
                                        <input type="number" class="form-control" id="" name="dimensi_p" value="" placeholer ="hanya masukan nilai tanpa satuan" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="dimensi_l">Dimensi Lebar (cm)</label>
                                        <input type="number" class="form-control" id="" name="dimensi_l" value="" placeholer ="hanya masukan nilai tanpa satuan" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="dimensi_t">Dimensi Tinggi (cm)</label>
                                        <input type="number" class="form-control" id="" name="dimensi_t" value="" placeholer ="hanya masukan nilai tanpa satuan" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="keteragan">Keterangan</label>
                                        <input type="text" class="form-control" id="" name="keterangan" value="" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="pdf_path">Upload PDF <i style ="color: red;"><u>*ukuran maksimal 20mb</u></i></label>
                                        <input type="file" name="pdf_path" class="form-control" id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="cover_path">Upload Gambar Cover <i style ="color: red;"><u>*ukuran maksimal 5mb</u></i></label>
                                        <input type="file" name="cover_path" class="form-control" id="">
                                    </div>

                                    <button type="submit" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
