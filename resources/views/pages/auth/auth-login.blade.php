@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

    <style>
        /* Atur gambar background */
        body {
            background-image: url('{{ asset('img/background_login.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            border-radius: 20px;
            border: 2px solid #003427; /* Mengatur border hijau */
            padding: 10px;
        }

        .form-control:focus {
            border-color: #007bff; /* Mengubah warna border menjadi biru saat fokus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Menambahkan glow biru */
        }
        .card-header {
            display: flex; /* Aktifkan flexbox */
            justify-content: center; /* Pusatkan secara horizontal */
            align-items: center; /* Pusatkan secara vertikal */
            height: 60px; /* Opsional: tambahkan tinggi tetap */
            text-align: center; /* Pastikan teks tetap terpusat */
            background-color: transparent; /* Latar belakang opsional */
        }

    </style>
@endpush

@section('main')
    <div class="card card-primary" style="border-radius: 20px; border: none; background-color: rgba(255, 255, 255, 0.7);">
        <div class="card-header" style="border: none;">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" tabindex="1" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-between">
                    <a href="{{ route('masuk.beranda') }}" class="btn rounded-pill" style="color: white; width: 150px; background-color: #2D69C2;" tabindex="4">Ke beranda</a>    
                    <button type="submit" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427; margin-left: 20px" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
