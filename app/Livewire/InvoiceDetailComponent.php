<?php

namespace App\Livewire;
use App\Models\Stok_masuk;
use Livewire\Component;

class InvoiceDetailComponent extends Component
{
        public $id;
        public $invoice;

        public function mount($id)
        {
            $this->id = $id;
            $this->invoice = Stok_masuk::findOrFail($id);
        }

        public function render()
        {
            return view('livewire.invoice-detail-component');
        }

}
