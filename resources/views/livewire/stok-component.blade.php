<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form>
            <div class="mb-3 row">
                <label for="produk_id" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                    <select class="form-control" id="produk_id" wire:model="produk_id">
                        <option value="">-- Pilih Produk --</option>
                            <option value="{{ $produk->produk_id }}">{{ $produk->nama_produk }}</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah" wire:model="jumlah">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ukuran" wire:model="ukuran">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kedaluarsa" class="col-sm-2 col-form-label">Tanggal Kedaluwarsa</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="kedaluarsa" wire:model="kedaluarsa">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-primary" wire:click="store">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama Produk</th>
                    <th class="col-md-3">Kategori</th>
                    <th class="col-md-2">Tanggal Masuk</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Del</a>
                                </td>
                            </tr>
                    </tbody>
                </tr>
            </tbody>
        </table>

    </div>

