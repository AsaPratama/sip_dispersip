@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Arsip dan Koleksi</h1>
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
                                <h4>Daftar Arsip dan Koleksi</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('koleksi.create') }}" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 5%;">No</th>
                                                <th>Judul</th>
                                                <th style="width: 30%;">Penulis</th>
                                                <th>Thn Terbit</th>
                                                <th>Kondisi</th>
                                                <th>Rak</th>
                                                <th style="width: 23%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($korans as $koran)
                                                <tr>
                                                    <td>{{ $loop->iteration + ($korans->currentPage() - 1) * $korans->perPage() }}</td>
                                                    <td>{{ $koran->judul }}</td>
                                                    <td>{{ $koran->penulis }}</td>
                                                    <td>{{ $koran->tahun_terbit }}</td>
                                                    <td>{{ $koran->kondisi }}</td>
                                                    <td>{{ $koran->rak->nama_rak }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('koleksi.show', $koran->kode_koran) }}" class="btn btn-sm btn-success btn-icon">
                                                            <i class="fas fa-edit"></i> Detail
                                                        </a>
                                                        <a href="{{ route('koleksi.edit', $koran->kode_koran) }}" class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('koleksi.destroy', $koran->kode_koran) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete px-1" onclick="return confirm('Hapus data?')">
                                                                <i class="fas fa-times"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <!-- Tampilkan Link Paginasi -->
                                        <div class="d-flex justify-content-center mt-3">
                                            {{ $korans->links('pagination::bootstrap-4') }}
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
