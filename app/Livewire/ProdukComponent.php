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
    public $kode_produk, $nama_produk, $merk, $tipe, $berat, $categories_id, $harga_beli, $harga_jual, $stok;
    public $updateMode = false;
    protected $listeners = ['kodeProdukScanned'];
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function rules()
    {
        return [
            'kode_produk'    => 'required|unique:produk,kode_produk,' . $this->produk_id,
            'nama_produk'    => 'required',
            'merk'           => 'nullable',
            'categories_id'  => 'required',
            'tipe'           => 'nullable',
            'berat'          => 'nullable|numeric',
            'harga_beli'     => 'required|numeric',
            'harga_jual'     => 'required|numeric',
            'stok'           => 'required|integer',
        ];
    }

    public function kodeProdukScanned($value)
    {
        $this->kode_produk = $value;
    }
    
    public function store()
    {
        $this->produk_id = 'NULL'; // untuk validasi unique saat store
        $validated = $this->validate();

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
        $this->harga_beli    = $dataproduk->harga_beli;
        $this->harga_jual    = $dataproduk->harga_jual;
        $this->stok          = $dataproduk->stok;

        $this->updateMode = true;
    }

    public function update()
    {
        $validated = $this->validate();

        $dataproduk = Produk::findOrFail($this->produk_id);
        $dataproduk->update($validated);

        session()->flash('message', 'Produk berhasil diperbarui');
        $this->resetForm();
    }

    public function delete($id)
    {
        Produk::findOrFail($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus');
    }

    public function resetForm()
    {
        $this->reset([
            'produk_id', 'kode_produk', 'nama_produk', 'merk',
            'categories_id', 'tipe', 'berat', 'harga_beli', 'harga_jual', 'stok'
        ]);
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
