@extends('layouts.app')
@section('content')
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah User</h4>
                </div>
                <div class="card-body">
            <form method="POST"></form>
            <div class="mb-3">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk" name="nama_produk" required>
            </div>

            <div class="mb-3">
                <label for="kategoriDropdown" class="form-label">Kategori Produk</label>
                <select id="kategoriDropdown" name="kategori_id" class="form-control" onchange="updateKategoriData()" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategories as $kategori)
                        <option
                            value="{{ $kategori->id }}"
                            data-nama="{{ $kategori->nama }}"
                            data-slug="{{ $kategori->slug }}">
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tipeHarga" class="form-label">Tipe Harga</label>
                <select id="tipeHarga" name="tipe_harga" class="form-control" onchange="togglePromoFields()" required>
                    <option value="normal">Harga Normal</option>
                    <option value="promo">Harga Promo (Diskon)</option>
                </select>
            </div>

            <!-- Harga Normal -->
            <div class="mb-3">
                <label for="hargaNormal" class="form-label">Harga Normal</label>
                <input type="number" class="form-control" id="hargaNormal" name="harga_normal" required>
            </div>

            <!-- Harga Promo dan Diskon -->
            <div id="promoFields" style="display: none;">
                <div class="mb-3">
                    <label for="hargaPromo" class="form-label">Harga Promo</label>
                    <input type="number" class="form-control" id="hargaPromo" name="harga_promo">
                </div>
                <div class="mb-3">
                    <label for="diskonProduk" class="form-label">Diskon (%)</label>
                    <input type="number" class="form-control" id="diskonProduk" name="diskon">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
<!-- Hidden nama dan slug kategori -->
<input type="hidden" id="namaKategori" name="nama_kategori">
<input type="hidden" id="slugKategori" name="slug_kategori">
@endsection
