<?php

namespace App\Livewire;
use App\Models\Produk;
use Livewire\Component;

class StokComponent extends Component
{
    public $produk;
    public $produk_id;

    public $user;
    public $user_id;
    public $jumlah;
    public $ukuran;
    public $kedaluarsa;

    public function mount()
    {
        $this->produk = Produk::all();
    }
    public function render()
    {
        return view('livewire.stok-component');
    }
}
