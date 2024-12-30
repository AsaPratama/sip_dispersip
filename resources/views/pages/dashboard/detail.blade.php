<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cari koran &mdash; Dispersip Kalsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex-grow: 1;
        }

        .footer {
            width: 98%; 
            background-color: #003427; 
            padding: 20px 0; 
            text-align: center;
            color: white; 
            margin: 0 auto;
            border-radius: 20px 20px 0 0;
        }

        .footer p {
            color: #ADADAD;
            margin: 0;
            font-size: 12px; 
        }

        .footer h5 {
            color: #ffffff;
            margin: 0;
        }

        .footer a {
            color: #003427;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .navbar {
            background-color: #003427;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .navbar a {
            color: white;
        }

        .input-group-text {
            width: 140px;
            text-align: left;
        }
    </style>
</head>
<body>

    <!--Content-->
    <div class="content">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Coat_of_arms_of_South_Kalimantan.svg/1200px-Coat_of_arms_of_South_Kalimantan.svg.png" alt="Logo Kalsel" width="40">
                    <span style="color: white;">Dispersip Kalimantan Selatan</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                        <a href="{{route('cari.index') }}" class="btn ms-auto rounded-pill" style="color: white; width: 150px; background-color: #003427;" tabindex="4" ">Kembali</a>    
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col d-flex justify-content-center">
                <div class="card text-center" style="width: 22rem;">
                        @if ($koran->cover_path)
                            <img src="{{ asset( $koran->cover_path) }}" class="card-img-top" alt="" style="width: 100%; height: 400px; object-fit: cover;">
                        @else
                            <img src="{{ url('img/not found.png')}}" class="card-img-top" alt="" style="width: 100%; height: 400px; object-fit: cover;">
                        @endif       
                    <div class="card-body">
                        <h5 class="card-title py-2">{{ $koran->judul }}</h5>
                        @if ($koran->pdf_path)
                            <a href="{{ asset($koran->pdf_path) }}" class="btn btn-primary" target="_blank">Buka PDF</a>
                        @else
                            <span class="text-danger">File PDF tidak tersedia</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Penulis</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->penulis }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Penerbit</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->penerbit }}" readonly>
                </div>
         
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tahun terbit</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->tahun_terbit }}" readonly>
                </div>
       
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Jumlah halaman</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->jumlah_halaman }}" readonly>
                </div>
        
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kondisi</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->kondisi }}" readonly>
                </div>
         
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Letak rak</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->rak->nama_rak }}" readonly>
                </div>
          
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Jumlah buku</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->jumlah_buku }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Jenis Koleksi</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $koran->jenis_koleksi }}" readonly>
                </div>
        </div>
    </div>
    
    <!--Footer-->
    <footer class="footer mt-5">
        <div class="container-fluid">
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
