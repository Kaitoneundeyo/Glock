@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>DATA KATEGORI</h1>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Daftar Kategori</h4>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-lg">
                + Tambah Kategori
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>URL</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($category as $cat)
                        @if (isset($cat->id))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->name ?? 'N/A' }}</td>
                                <td>{{ $cat->slug ?? 'N/A' }}</td>
                                <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                    <i class="fas fa-pen"></i>Edit
                                </a>
                                <!-- Tombol Delete -->
                                <a data-toggle="modal" data-target="#modal-hapus{{ $user->id }}" class="btn btn-danger">
                                  <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                                <!-- Modal -->
                              <div class="modal fade" id="modal-hapus{{ $user->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $user->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </td>
                        </tr>
                            @else
                                <tr>
                                    <td colspan="4">Data not available</td>
                                </tr>
                            @endif
                        @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
