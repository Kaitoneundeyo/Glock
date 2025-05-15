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
    public $produk_id;
    public $kode_produk, $nama_produk, $merk, $tipe, $berat, $categories_id;
    public $updateMode = false;

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
        $this->resetForm();
    }

    public function edit($id)
    {
        $dataproduk = Produk::findOrFail($id);
        $this->produk_id     = $dataproduk->id;
        $this->kode_produk   = $dataproduk->kode_produk;
        $this->nama_produk   = $dataproduk->nama_produk;
        $this->merk          = $dataproduk->merk;
        $this->categories_id = $dataproduk->categories_id;
        $this->tipe          = $dataproduk->tipe;
        $this->berat         = $dataproduk->berat;
        $this->updateMode    = true;
    }

    public function update()
    {
        $rules = [
            'kode_produk'    => 'required|unique:produk,kode_produk,' . $this->produk_id,
            'nama_produk'    => 'required',
            'merk'           => 'required',
            'categories_id'  => 'required',
            'tipe'           => 'required',
            'berat'          => 'required',
        ];

        $validated = $this->validate($rules);
        $dataproduk = Produk::findOrFail($this->produk_id);
        $dataproduk->update($validated);

        session()->flash('message', 'Produk berhasil diperbarui');
        $this->resetForm();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        Produk::findOrFail($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus');
    }

    public function resetForm()
    {
        $this->reset(['produk_id', 'kode_produk', 'nama_produk', 'merk', 'categories_id', 'tipe', 'berat']);
        $this->updateMode = false;
    }

    public function render()
    {
        $dataproduk = Produk::orderBy('nama_produk', 'asc')->paginate(5);

        return view('livewire.produk-component', [
            'dataproduk' => $dataproduk,
        ]);
    }
}
