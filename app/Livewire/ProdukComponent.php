<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProdukComponent extends Component
{
    public $categories;
    public $categories_id;
    public $nama_produk;
    public $tanggal_masuk;
    public $deskripsi;

    public function mount ()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.produk-component');
    }
}
