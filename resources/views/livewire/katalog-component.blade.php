<div class="container mt-5">
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    {{-- Cek apakah ada gambar utama --}}
                    @if($produk->gambarUtama)
                        <img src="{{ asset('storage/' . $produk->gambarUtama->nama_file) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                    @else
                        {{-- Gambar default jika tidak ada --}}
                        <img src="{{ asset('images/default-product.png') }}" class="card-img-top" alt="No image">
                    @endif

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ $produk->deskripsi ?? 'Tidak ada deskripsi' }}</p>

                        {{-- Harga aktif (promo) atau fallback ke harga default --}}
                        @if($produk->hargaAktif)
                            <h6>Rp{{ number_format($produk->hargaAktif->harga, 0, ',', '.') }} <small class="text-success">(Promo)</small></h6>
                        @else
                            {{-- Jika kamu punya harga default di tabel produk, misal kolom harga --}}
                            <h6>Rp{{ number_format($produk->harga, 0, ',', '.') }}</h6>
                        @endif

                        <button wire:click="addToCart({{ $produk->id }})" class="btn btn-primary mt-2">Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
