@extends('layouts.app')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Pengguna</h1>
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
                                <h4>Daftar Pengguna</h4>
                                <div class="card-header-action">
                                    <a href="{{route('user.create')}}" class="btn rounded-pill" style="color: white; width: 150px; background-color: #003427;">Tambah Pengguna</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="text-center" style="width: 5%;"  >No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center" style="width: 30%;">Email</th>
                                                <th class="text-center" style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                                    <td>{{ $user->name}}</td>
                                                    <td>{{ $user->email}}</td>
                                                    <td class="text-center" style:"width: 80px;">
                                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
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
                                            {{ $users->links('pagination::bootstrap-4') }}
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
