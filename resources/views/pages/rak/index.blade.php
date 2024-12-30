@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Rak</h1>
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
                                <h4>Daftar Rak</h4>
                                <div class="card-header-action">
                                    <a href="{{route('rak.create')}}" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Tambah Rak</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="text-center" style="width: 5%;"  >No</th>
                                                <th class="text-center">Nama Rak</th>
                                                <th class="text-center" style="width: 30%;">Lokasi Rak</th>
                                                <th class="text-center" style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($raks as $rak)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $rak->nama_rak}}</td>
                                                    <td>{{ $rak->lokasi_rak}}</td>
                                                    <td class="text-center" style:"width: 80px;">
                                                        <a href="{{route('rak.edit', $rak->id)}}" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('rak.destroy', $rak->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete px-1" onclick="return confirm('Are you sure?')">
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
                                            {{ $raks->links('pagination::bootstrap-4') }}
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
