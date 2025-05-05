<div class="p-4 border">
    <h2>Form Produk Sederhana</h2>

    <form wire:submit.prevent="simpan">
        <input type="text" wire:model="namaProduk" placeholder="Nama produk">
        <button type="submit">Simpan</button>
    </form>

    <hr>

    <h4>Data Produk</h4>
    <ul>
        @foreach($listProduk as $produk)
            <li>{{ $produk }}</li>
        @endforeach
    </ul>
</div>
