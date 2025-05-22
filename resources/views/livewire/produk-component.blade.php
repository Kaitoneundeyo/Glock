<div class="container">
    {{-- Form Tambah Produk --}}
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        {{-- Kode Produk --}}
        <div class="mb-3 row">
            <label for="kode_produk" class="col-sm-2 col-form-label text-black">Kode Produk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="kode_produk" class="form-control" id="kode_produk">
                @error('kode_produk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Nama Produk --}}
        <div class="mb-3 row">
            <label for="nama_produk" class="col-sm-2 col-form-label text-black">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="nama_produk" class="form-control" id="nama_produk">
                @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Merk --}}
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label text-black">Merk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="merk" class="form-control" id="merk">
                @error('merk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Kategori --}}
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label text-black">Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" id="kategori" wire:model="categories_id">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('categories_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Varian / Tipe --}}
        <div class="mb-3 row">
            <label for="tipe" class="col-sm-2 col-form-label text-black">Varian</label>
            <div class="col-sm-10">
                <input type="text" wire:model="tipe" class="form-control" id="tipe">
                @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Berat --}}
        <div class="mb-3 row">
            <label for="berat" class="col-sm-2 col-form-label text-black">Berat</label>
            <div class="col-sm-10">
                <select wire:model="berat" class="form-control" id="berat">
                    <option value="">Pilih Berat</option>
                    @for ($i = 50; $i <= 2000; $i += 50)
                        <option value="{{ $i }}">{{ $i }} gram</option>
                    @endfor
                </select>
                @error('berat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

                {{-- Harga Beli --}}
        <div class="mb-3 row">
            <label for="harga_beli" class="col-sm-2 col-form-label text-black">Harga Beli</label>
            <div class="col-sm-10">
                <input type="number" wire:model="harga_beli" class="form-control" id="harga_beli" step="0.01">
                @error('harga_beli') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Harga Jual --}}
        <div class="mb-3 row">
            <label for="harga_jual" class="col-sm-2 col-form-label text-black">Harga Jual</label>
            <div class="col-sm-10">
                <input type="number" wire:model="harga_jual" class="form-control" id="harga_jual" step="0.01">
                @error('harga_jual') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Stok --}}
        <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label text-black">Stok</label>
            <div class="col-sm-10">
                <input type="number" wire:model="stok" class="form-control" id="stok">
                @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

       {{-- Tombol Simpan / Update --}}
        <div class="card-footer text-right">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-{{ $updateMode ? 'success' : 'primary' }} text-white">
                    {{ $updateMode ? 'Update Produk' : 'Simpan Produk' }}
                </button>
                @if($updateMode)
                    <button type="button" wire:click="resetForm" class="btn btn-outline-primary text-white">Batal</button>
                @endif
            </div>
        </div>


        {{-- Notifikasi Sukses --}}
        @if (session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message') }}</div>
        @endif
    </form>

    {{-- Tabel Data Produk --}}
   <div class="table-responsive bg-secondary text-nowrap">
        <table class="table table-bordered text-center text-black">
            <thead class="bg-blue-400">
                <tr>
                    <th class="d-none d-md-table-cell">No</th>
                    <th class="d-none d-md-table-cell">Kode</th>
                    <th class="d-none d-md-table-cell">Nama</th>
                    <th class="d-none d-md-table-cell">Merk</th>
                    <th class="d-none d-md-table-cell">Kategori</th>
                    <th class="d-none d-md-table-cell">Varian</th>
                    <th class="d-none d-md-table-cell">Berat</th>
                    <th class="d-none d-md-table-cell">Harga Beli</th>
                    <th class="d-none d-md-table-cell">Harga Jual</th>
                    <th class="d-none d-md-table-cell">Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduk as $key => $value)
                    <tr>
                        <td>{{ $dataproduk->firstItem() + $key }}</td>
                        <td class="text-truncate">{{ $value->kode_produk }}</td>
                        <td class="text-truncate">{{ $value->nama_produk }}</td>
                        <td class="d-none d-md-table-cell">{{ $value->merk }}</td>
                        <td class="d-none d-md-table-cell">{{ $value->category?->name ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">{{ $value->tipe }}</td>
                        <td class="d-none d-md-table-cell">{{ $value->berat }}</td>
                        <td class="d-none d-md-table-cell">Rp {{ number_format($value->harga_beli, 2, ',', '.') }}</td>
                        <td class="d-none d-md-table-cell">Rp {{ number_format($value->harga_jual, 2, ',', '.') }}</td>
                        <td>{{ $value->stok }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button wire:click="edit({{ $value->id }})"
                                    class="btn btn-sm btn-warning text-white mb-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ $value->id }})"
                                    class="btn btn-sm btn-danger text-white"
                                    title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $dataproduk->links() }}
    </div>
</div>
</div>
