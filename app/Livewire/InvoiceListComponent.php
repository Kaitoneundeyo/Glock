<?php

namespace App\Livewire;

use App\Models\Stok_masuk;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InvoiceListComponent extends Component
{
    public $stokMasuk;
    public function render()
    {
        $invoices = Stok_masuk::select('no_invoice', DB::raw('MIN(id) as id'), DB::raw('MIN(tanggal_masuk) as tanggal'))
            ->groupBy('no_invoice')
            ->orderByDesc('tanggal')
            ->get();

        return view('livewire.invoice-list-component', compact('invoices'));
    }
}
