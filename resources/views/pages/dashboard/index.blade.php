<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda &mdash; Dispersip Kalsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Make body use flexbox */
        body {
            background-image: url('img/background_putih.jpeg');
            background-size: cover; /* Memastikan gambar mengisi seluruh layar */
            background-position: center; /* Memusatkan gambar */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            background-attachment: fixed; /* Agar gambar tidak bergerak saat di-scroll */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Content wrapper to push footer down */
        .content {
            flex-grow: 1;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            border-radius: 0;
        }

        @media (max-width: 768px) {
            .carousel-item img {
                height: 200px; /* Ubah tinggi gambar untuk layar kecil */
            }

            .navbar-brand {
                font-size: 14px; /* Ubah ukuran font di layar kecil */
            }

            .navbar a {
                font-size: 12px; /* Ubah ukuran font untuk link pada navbar */
            }
        }

        .card {
            border: none; /* Menghilangkan outline card */
        }    

        .card-img-top {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin: 0 auto;
        }

        .search-box {
            width: 90%;
            border: 2px solid #003427;
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
                            <a href="{{ route('login') }}" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Login Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Carousel-->
        <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/slide1.png" class="d-block img-fluid" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="img/slide2.png" class="d-block img-fluid" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="img/slide3.png" class="d-block img-fluid" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--Teks-->
        <div class="container mt-2 text-center" style="margin-bottom: 20px;">
            <h5 style="color: #000000;">Cari Arsip atau Koleksi</h5>
        </div>

        <!--Search box-->       
        <div class="search-section">
            <form class="d-flex" style="margin-left: 68px; margin-right:68px;" action="{{ route('cari.index') }}" method="GET">
                <input class="form-control me-2 rounded-pill search-box" name="search" type="text" placeholder="Cari berdasarkan judul atau penulis..." required></input>
                <button class="btn ms-auto rounded-pill" style="color: white; width: 100px; background-color: #003427;">Cari</button>    
            </form>
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
                    <p style="text-align: left;  color: white;"><b>Kontak</b></p>
                    <p style="text-align: left;">(0511) 3256155</p> 
                    <p style="text-align: left;">dispersip.kalselprov.go.id</p>
                </div>
                <div class="col-md-6">
                    <p style="text-align: right;  color: white;"><b>Hari & jam kerja</b></p>
                    <p style="text-align: right;">Senin-Kamis 09.00-16.00</p>
                    <p style="text-align: right;">Jumat 09.00-11.00 Buka Lagi 14.00</p>
                    <p style="text-align: right;">Sabtu-Minggu 09.00-17.00</p>
                    <p style="text-align: right;">Tanggal Merah Libur Nasional (TUTUP)</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
