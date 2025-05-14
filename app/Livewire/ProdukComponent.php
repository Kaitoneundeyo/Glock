<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class ProdukComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categories;
    public $kode_produk, $nama_produk, $merk, $tipe, $berat, $categories_id;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $rules = [
            'kode_produk'    => 'required|unique:produk,kode_produk',
            'nama_produk'    => 'required',
            'merk'           => 'required',
            'categories_id'  => 'required',
            'tipe'           => 'required',
            'berat'          => 'required',
        ];

        $validated = $this->validate($rules);

        Produk::create($validated);

        session()->flash('message', 'Produk berhasil disimpan');

        $this->reset('kode_produk', 'nama_produk', 'merk', 'tipe', 'berat', 'categories_id');
    }

    public function render()
    {
        $dataproduk = Produk::orderBy('nama_produk', 'asc')->paginate(5);

        return view('livewire.produk-component', [
            'dataproduk' => $dataproduk,
        ]);
    }
}
