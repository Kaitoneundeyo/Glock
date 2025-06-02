<?php

namespace App\Livewire;
use App\Models\Produk;
use App\Models\Cart_item;
use Livewire\Component;

class KatalogComponent extends Component
{
    public $produks;
    public $produk_id;
    public function mount()
    {
        $this->produks = Produk::with([
            'kategori',
            'stokMasukItems',
            'hargaAktif',
            'semuaHarga',
            'gambarUtama',
            'gambar',
        ])->get();
    }


    public function addToCart($produk_id)
    {
        Cart_item::updateOrCreate(
            ['user_id' => auth()->id(), 'produk_id' => $produk_id],
            ['quantity' => \DB::raw('quantity + 1')]
        );

        session()->flash('message', 'Produk berhasil ditambahkan ke keranjang');
    }
    public function render()
    {
        return view('livewire.katalog-component');
    }
}
