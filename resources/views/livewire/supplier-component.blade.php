<div class="card">
    <div class="card-body">
        {{-- Bungkus semuanya dalam satu container --}}
        <div class="container-fluid">
            {{-- Form --}}
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nama_supplier" class="col-sm-2 col-form-label text-black">Nama Supplier</label>
                            <div class="col-sm-10">
                                <input wire:model="nama_supplier" type="text" class="form-control"
                                    placeholder="Nama Supplier">
                                @error('nama_supplier') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label text-black">Alamat</label>
                            <div class="col-sm-10">
                                <input wire:model="alamat" type="text" class="form-control" placeholder="Alamat">
                                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kontak" class="col-sm-2 col-form-label text-black">Kontak</label>
                            <div class="col-sm-10">
                                <input wire:model="kontak" type="text" class="form-control" placeholder="Kontak">
                                @error('kontak') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
                            @if($isEdit)
                                <button type="button" class="btn btn-secondary" wire:click="resetForm">Batal</button>
                            @endif
                        </div>
                    </form>

                    @if (session()->has('message'))
                        <div class="alert alert-success mt-2">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- Table --}}
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="mb-3">
                        <input wire:model="search" type="text" class="form-control"
                            placeholder="Cari nama supplier atau kontak...">
                    </div>
                    <table class="table table-bordered text-center text-black">
                        <thead class="bg-blue-400">
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($suppliers as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->nama_supplier }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->kontak }}</td>
                                    <td>
                                        <button wire:click="edit({{ $value->id }})"
                                            class="btn btn-sm btn-warning">Edit</button>
                                        <button wire:click="delete({{ $value->id }})" class="btn btn-sm btn-danger"
                                            onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada data supplier.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
