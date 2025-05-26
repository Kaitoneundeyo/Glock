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
    public $stokmasuk_id;
    public $isEdit = false;

    public function mount()
    {
        $this->suppliers = Supplier::with('stokMasuks')->get();
        $this->tanggal_masuk = Carbon::today()->toDateString();
        $this->generateNomorInvoice();
    }

    public function generateNomorInvoice()
    {
        $today = Carbon::today();
        $year = $today->format('Y');
        $month = $today->format('m');
        $day = $today->format('d');

        // Ambil semua invoice hari ini dan cari nomor urut tertinggi
        $lastInvoice = Stok_masuk::whereDate('tanggal_masuk', $today)
            ->orderBy('no_invoice', 'desc')
            ->value('no_invoice');

        if ($lastInvoice) {
            // Ambil bagian nomor urut dari invoice hari ini: RYM-00001/2025/05/22
            preg_match('/RYM-(\d{5})\/' . $year . '\/' . $month . '\/' . $day . '/', $lastInvoice, $matches);
            $lastNumber = isset($matches[1]) ? (int) $matches[1] : 0;
        } else {
            $lastNumber = 0;
        }

        // Tambahkan +1 dan format 5 digit
        $nextNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        // Hasilkan nomor invoice
        $this->no_invoice = "RYM-$nextNumber/$year/$month/$day";
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

        // Reset form dan buat nomor invoice baru
        $this->resetForm();
        $this->tanggal_masuk = Carbon::today()->toDateString();
        $this->generateNomorInvoice();
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
        $this->reset(['no_invoice', 'supplier_id', 'stokmasuk_id', 'isEdit']);
        $this->tanggal_masuk = Carbon::today()->toDateString();
        $this->generateNomorInvoice();
    }


    public function render()
    {
        $stokMasuks = Stok_masuk::with('supplier')
            ->where('no_invoice', 'like', '%' . $this->search . '%')
            ->orderBy('tanggal_masuk', 'desc')
            ->get();

        return view('livewire.stokmasuk-component', [
            'stokMasuks' => $stokMasuks,
            'suppliers' => $this->suppliers ?? [], // Fallback agar tidak null
        ]);
    }
}
