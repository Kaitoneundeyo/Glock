<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProdukComponent extends Component
{
    public $nama_produk;
    public $deskripsi;

    public function mount($nama_produk = '', $deskripsi = '')
    {
        $this->nama_produk = $nama_produk;
        $this->deskripsi = $deskripsi;
    }

    public function render()
    {
        return view('livewire.produk-component');
    }
}
