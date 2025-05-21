<?php

namespace App\Livewire;

use App\Models\Stok_masuk;
use App\Models\Supplier;
use Carbon\Carbon;
use Livewire\Component;

class StokmasukComponent extends Component
{
    public $no_invoice, $tanggal_masuk, $supplier_id;
    public $suppliers, $search;
    public $filterTanggalMasuk, $filterNoInvoice, $filterSupplier;
    public $stokmasuk_id;
    public $isEdit = false;

    public function mount()
    {
        $this->generateNomorInvoice();
        $this->tanggal_masuk = now()->toDateString();
        $this->suppliers = Supplier::with('stokMasuks')->get();
    }

    public function generateNomorInvoice()
    {
        $today = Carbon::now();
        $tanggalFormatted = $today->format('Y/m/d');
        $prefix = 'RYM-' . $tanggalFormatted;

        $count = Stok_masuk::whereDate('tanggal_masuk', $today->toDateString())
            ->where('no_invoice', 'like', $prefix . '%')
            ->count();

        $noUrut = str_pad($count + 1, 5, '0', STR_PAD_LEFT);
        $this->no_invoice = $prefix . '/' . $noUrut;
    }

    protected function rules()
    {
        return [
            'no_invoice' => 'required|unique:stok_masuks,no_invoice,' . $this->stokmasuk_id,
            'tanggal_masuk' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }

    public function store()
    {
        $this->validate();

        Stok_masuk::create([
            'no_invoice' => $this->no_invoice,
            'tanggal_masuk' => $this->tanggal_masuk,
            'supplier_id' => $this->supplier_id,
        ]);


        session()->flash('message', 'Data berhasil disimpan.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $stok = Stok_masuk::findOrFail($id);
        $this->stokmasuk_id = $stok->id;
        $this->no_invoice = $stok->no_invoice;
        $this->tanggal_masuk = $stok->tanggal_masuk;
        $this->supplier_id = $stok->supplier_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();

        $stok = Stok_masuk::findOrFail($this->stokmasuk_id);
        $stok->update([
            'no_invoice' => $this->no_invoice,
            'tanggal_masuk' => $this->tanggal_masuk,
            'supplier_id' => $this->supplier_id,
        ]);

        session()->flash('message', 'Data berhasil diperbarui.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Stok_masuk::findOrFail($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['no_invoice', 'tanggal_masuk', 'supplier_id', 'stokmasuk_id', 'isEdit']);
        $this->generateNomorInvoice();
        $this->tanggal_masuk = now()->toDateString();
    }

    public function render()
    {
        $stokMasuks = Stok_masuk::with('supplier')
        ->when($this->filterTanggalMasuk, fn($q) => $q->whereDate('tanggal_masuk', $this->filterTanggalMasuk))
        ->when($this->filterNoInvoice, fn($q) => $q->where('no_invoice', 'like', '%' . $this->filterNoInvoice . '%'))
        ->when($this->filterSupplier, fn($q) => $q->where('supplier_id', $this->filterSupplier))
        ->orderBy('tanggal_masuk', 'desc')
        ->get();


        return view('livewire.stokmasuk-component', [
            'stokMasuks' => $stokMasuks,
            'suppliers' => $this->suppliers,
        ]);
    }
}
