@extends('layouts.app')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Arsip dan Koleksi</h1>  
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
                                <h4>Edit Data Arsip dan Koleksi</h4>
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
                                @foreach($koran as $korans)
                                <form action="{{route('koleksi.update', $korans -> kode_koran)}}" method="POST" enctype="multipart/form-data">
                                   
                                @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="" name="judul" value="{{$korans->judul}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" id="" name="penulis" value="{{$korans->penulis}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control" id="" name="penerbit" value="{{$korans->penerbit}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input type="number" min="1800" max="2024" class="form-control" id="" name="tahun_terbit" value="{{$korans->tahun_terbit}}" required required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_halaman">Jumlah Halaman</label>
                                        <input type="number" min="1" max="10000" class="form-control" id="" name="jumlah_halaman" value="{{$korans->jumlah_halaman}}" required required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi">Kondisi</label>
                                        <select id="" name="kondisi" class="form-control">
                                            <option value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi">Rak</label>
                                        <select id="" name="rak_id" class="form-control"> 
                                            <option value="{{ $korans -> rak_id}}">
                                                {{$korans -> rak -> nama_rak}}
                                            </option>    
                                            @foreach($raks as $rak) 
                                            <option value="{{ $rak -> id}}">
                                                {{$rak -> nama_rak}}
                                            </option>  
                                            @endforeach                                         
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_buku">Jumlah Buku</label>
                                        <input type="number" min="1" max="1000" class="form-control" id="" name="jumlah_buku" value="{{$korans->jumlah_buku}}" required required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="jenis_koleksi">Jenis Koleksi</label>
                                        <select id="" name="jenis_koleksi" class="form-control">
                                            <option value="{{ $korans->jenis_koleksi}}">{{ $korans->jenis_koleksi}}</option>
                                            <option value="Naskah Kuno">Naskah Kuno</option>
                                            <option value="Majalah">Majalah</option>
                                            <option value="Buku">Buku</option>
                                            <option value="Koran">Koran</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="pdf_path">Upload PDF</label>
                                        <input type="file" name="pdf_path" class="form-control" value="" id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="cover_path">Upload Gambar Cover</label>
                                        <input type="file" name="cover_path" class="form-control" value="{{$korans->cover_path}}" id="">
                                    </div>

                                    @endforeach


                                    <button type="submit" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Simpan perubahan</button>
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
