<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cari koran &mdash; Dispersip Kalsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Make body use flexbox */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Content wrapper to push footer down */
        .content {
            flex-grow: 1;
        }

        .footer {
            width: 98%; /* Full width */
            background-color: #003427; /* Background color */
            padding: 20px 0; /* Padding */
            text-align: center; /* Centered text */
            color: white; /* Text color */
            margin: 0 auto; /* Memusatkan gambar */
            border-radius: 20px 20px 0 0; /* Rounded top corners only */
        }

        .footer p {
            color: #ADADAD   ; /* Set footer font color to white */
            margin: 0; /* Optional: remove default margin */
            font-size: 12px; 
        }

        .footer h5 {
            color: #ffffff; /* Set footer font color to white */
            margin: 0; /* Optional: remove default margin */
        }

        .footer a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline from links */
        }

        .footer a:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        .navbar {
            background-color: #003427   ; /* Change this to your desired color */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .navbar a {
            color: white; /* Change text color for links */
        }

        .card-title {
            white-space: nowrap;         /* Membatasi teks dalam satu baris */
            overflow: hidden;            /* Menyembunyikan teks yang melampaui batas */
            text-overflow: ellipsis;     /* Menampilkan tiga titik jika teks terlalu panjang */
            max-width: 140px;            /* Atur lebar maksimal sesuai kebutuhan */
        }

        .card-title1 {
            white-space: nowrap;         /* Membatasi teks dalam satu baris */
            overflow: hidden;            /* Menyembunyikan teks yang melampaui batas */
            text-overflow: ellipsis;     /* Menampilkan tiga titik jika teks terlalu panjang */
            max-width: 300px;            /* Atur lebar maksimal sesuai kebutuhan */
        }


        
    </style>
</head>
<body>

    <!--Content-->
    <div class="content">
        <!--Navbar-->
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Coat_of_arms_of_South_Kalimantan.svg/1200px-Coat_of_arms_of_South_Kalimantan.svg.png" alt="Logo Kalsel" width="40">
                <span class="navbar-brand mb-0 h1 ms-2" style="color: white";>Dispersip Kalimantan Selatan</span>
                <a href="{{ route('masuk.beranda') }}" class="btn ms-auto rounded-pill" style="color: white; width: 150px; background-color: #003427;" tabindex="4" ">Ke beranda</a>    
            </div>
        </nav>
    </div>

    @if($korans->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 50vh;">
            <p class="text-center mb-3">Tidak ada hasil ditemukan.</p>
        </div>
    @endif


    <!--Content-->
    <div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Card 1 -->
        @foreach($korans as $koran)
   
        <div class="col-md-4 mt-5 mb-5 d-flex justify-content-center">
            <div class="card" style="width: 22rem;">
                    @if ($koran->cover_path)
                        <img src="{{ asset( $koran->cover_path) }}" class="card-img-top" alt="..." style="width: 100%; height: 400px; object-fit: cover;">
                        @else
                        <img src="img/not found.png" class="card-img-top" alt="" style="width: 100%; height: 400px; object-fit: cover;">
                        @endif
                
                <div class="card-body">
                    <h5 class="card-title1">{{ $koran->judul }} - {{ $koran->penulis }}</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Penerbit</h6>
                            <h5 class="card-title">{{ $koran->penerbit }}</h5>
                        </div>
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Tahun terbit</h6>
                            <h5 class="card-title">{{ $koran->tahun_terbit }}</h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah halaman</h6>
                            <h5 class="card-title">{{ $koran->jumlah_halaman }}</h5>
                        </div>
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Kondisi</h6>
                            <h5 class="card-title">{{ $koran->kondisi }}</h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Letak rak</h6>
                            <h5 class="card-title">{{ $koran->rak->nama_rak }}</h5>
                        </div>
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah buku tersedia</h6>
                            <h5 class="card-title">{{ $koran->jumlah_buku}}</h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Jenis Koleksi</h6>
                            <h5 class="card-title">{{ $koran->jenis_koleksi}}</h5>
                        </div>
                    </div>
                    <br>
                    <a href="{{route('koran.detail', $koran -> kode_koran)}}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        
        @endforeach   
    </div>
</div>



    <!--Footer-->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p style="text-align: left;">Jl. A. Yani Km. 6,400 No.6, Pemurus Luar, Kec. Banjarmasin Timur 
                       Kota Banjarmasin, Kalimantan Selatan.
                    </p>
                    <p style="text-align: left;  color: white; "><b>Kontak</b></p>
                    <p style="text-align: left;">(0511) 3256155</p> 
                    <p style="text-align: left;">dispersip.kalselprov.go.id</p>
                </div>
                <div class="col-md-6">
                    <p style="text-align: right;  color: white;"><b>Hari & jam kerja</b></p>
                    <p style="text-align: right;">Senin-Kamis 09.00-16.00</p>
                    <p style="text-align: right;">Jum'at 09.00-11.00 Buka Lagi 14.00</p>
                    <p style="text-align: right;">Sabtu-Minggu 09.00-17.00</p>
                    <p style="text-align: right;">Tanggal Merah Libur Nasional (TUTUP)</p>
                </div>
            </div>
        </div>
    </footer>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
