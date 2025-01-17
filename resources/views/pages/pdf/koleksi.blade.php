
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
                                                    <td>{{ $koran->rak ? $koran->rak->nama_rak : 'Tidak tersedia' }}</td>
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
