<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form>
            <div class="mb-3 row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-control" id="kategori" wire:model="categories_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="button" class="btn btn-primary" name="submit" wire:click="store()">SIMPAN</button>
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
