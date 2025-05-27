<?php

namespace App\Livewire;
use App\Models\Produk;
use Livewire\Component;

class HargaComponent extends Component
{
    public $produk_id, $harga_jual, $harga_promo , $tanggal_mulai_promo, $tanggal_selesai_promo;
    public $produkList = [];

    public function mount()
    {
        $this->produkList = Produk::all();
    }
    public function render()
    {
        return view('livewire.harga-component');
    }
}
