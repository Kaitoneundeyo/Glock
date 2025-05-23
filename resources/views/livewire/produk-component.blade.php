<div class="container">
    {{-- Form Tambah Produk --}}
    <form wire:submit.prevent="store">
        {{-- Kode Produk --}}
        <div class="mb-3 row">
            <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="kode_produk" class="form-control" id="kode_produk">
                @error('kode_produk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Nama Produk --}}
        <div class="mb-3 row">
            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="nama_produk" class="form-control" id="nama_produk">
                @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Merk --}}
        <div class="mb-3 row">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <input type="text" wire:model="merk" class="form-control" id="merk">
                @error('merk') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Kategori --}}
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
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
            <label for="tipe" class="col-sm-2 col-form-label">Varian</label>
            <div class="col-sm-10">
                <input type="text" wire:model="tipe" class="form-control" id="tipe">
                @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- Berat --}}
        <div class="mb-3 row">
            <label for="berat" class="col-sm-2 col-form-label">Berat</label>
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

        {{-- Tombol Simpan --}}
        <div class="card-footer text-right">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </div>
        </div>

        {{-- Notifikasi Sukses --}}
        @if (session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message') }}</div>
        @endif
    </form>

    {{-- Tabel Data Produk --}}
    <div class="my-4 p-3 bg-body rounded shadow-sm">
        {{ $dataproduk->links() }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Kode</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">Merk</th>
                    <th class="col-md-2">Kategori</th>
                    <th class="col-md-2">Varian</th>
                    <th class="col-md-2">Berat</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduk as $key => $value)
                    <tr>
                        <td>{{ $dataproduk->firstItem() + $key }}</td>
                        <td>{{ $value->kode_produk }}</td>
                        <td>{{ $value->nama_produk }}</td>
                        <td>{{ $value->merk }}</td>
                        <td>{{ $value->category ? $value->category->name : 'Kategori Tidak Ditemukan' }}</td>
                        <td>{{ $value->tipe }}</td>
                        <td>{{ $value->berat }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Del</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
