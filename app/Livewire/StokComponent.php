<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Stock_ins;
use App\Models\Produk;
use Livewire\WithPagination;

class StokComponent extends Component
{
    use WithPagination;

    public $produk_id, $kode_produk, $jumlah, $harga_beli, $tanggal_masuk, $expired_at, $no_invoice;
    public $produkList = [];
    public $stock_ins_id;
    public $kode_produk;
    public $updateMode = false;


    public function mount()
    {
    $this->produkList = Produk::all();

    // Optional: Default pilih produk pertama (ID 1)
    if (!$this->produk_id && $this->produkList->isNotEmpty()) {
        $this->produk_id = $this->produkList->first()->id;
        $this->kode_produk = $this->produkList->first()->kode_produk;
    }
    }


    public function render()
    {
        return view('livewire.stok-component', [
        'datastok' => Stock_ins::with('produk')->latest()->paginate(10),
        'produkList' => Produk::all(),
    ]);
    }


   private function resetForm()
    {
        $this->produk_id = null;
        $this->jumlah = null;
        $this->harga_beli = null;
        $this->tanggal_masuk = null;
        $this->expired_at = null;
        $this->no_invoice = null;
        $this->stock_ins_id = null;
    }

    public function store()
{
    $this->validate([
        'produk_id' => 'required|exists:produk,produk_id',
        'jumlah' => 'required|integer',
        'harga_beli' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'expired_at' => 'nullable|date|after_or_equal:tanggal_masuk',
        'no_invoice' => 'required|string',
    ]);

    Stock_ins::create([
        'produk_id' => $this->produk_id,
        'jumlah' => $this->jumlah,
        'harga_beli' => $this->harga_beli,
        'tanggal_masuk' => $this->tanggal_masuk,
        'expired_at' => $this->expired_at,
        'no_invoice' => $this->no_invoice,
    ]);

    session()->flash('message', 'Stok berhasil disimpan.');
    $this->resetForm();
}

public function edit($id)
{
    $datastok = Stock_ins::findOrFail($id);
    $this->produk_id = $datastok->produk_id;
    $this->jumlah = $datastok->jumlah;
    $this->harga_beli = $datastok->harga_beli;
    $this->tanggal_masuk = $datastok->tanggal_masuk;
    $this->expired_at = $datastok->expired_at;
    $this->no_invoice = $datastok->no_invoice;
    $this->updateMode = true;
}

public function update()
{
    $this->validate([
        'produk_id' => 'required|exists:produk,id',
        'jumlah' => 'required|integer',
        'harga_beli' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'expired_at' => 'nullable|date|after_or_equal:tanggal_masuk',
        'no_invoice' => 'required|string',
    ]);

    $datastok = Stock_ins::findOrFail($this->stok_id);
    $datastok->update([
        'produk_id' => $this->produk_id,
        'jumlah' => $this->jumlah,
        'harga_beli' => $this->harga_beli,
        'tanggal_masuk' => $this->tanggal_masuk,
        'expired_at' => $this->expired_at,
        'no_invoice' => $this->no_invoice,
    ]);

    session()->flash('message', 'Stok berhasil diperbarui.');
    $this->resetForm();
    $this->updateMode = false;
}

}
