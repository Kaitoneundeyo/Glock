<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Stock_ins;
use App\Models\Produk;
use Illuminate\Support\Carbon;

class StokComponent extends Component
{
    use WithPagination;

    public $produk_id, $jumlah, $harga_beli, $tanggal_masuk, $expired_at, $no_invoice;
    public $search = '';
    public $sortDirection = 'asc';
    public $sortField = 'nama_produk';
    public $tanggalFilter = null;

    public $stok_id; // untuk update

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->tanggal_masuk = now()->format('Y-m-d');
    }

    public function updated($property)
    {
        if (in_array($property, ['search', 'tanggalFilter', 'sortField', 'sortDirection'])) {
            $this->resetPage();
        }
    }

    public function generateInvoiceNumber()
    {
        $date = now();
        $prefix = 'INV-' . $date->format('Y/m/d');

        $lastInvoice = Stock_ins::whereDate('created_at', $date->toDateString())
            ->where('no_invoice', 'like', $prefix . '/%')
            ->latest('id')
            ->first();

        $nextNumber = 1;

        if ($lastInvoice) {
            $lastNumber = intval(substr($lastInvoice->no_invoice, strrpos($lastInvoice->no_invoice, '/') + 1));
            $nextNumber = $lastNumber + 1;
        }

        return $prefix . '/' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }

    public function store()
    {
        $this->validate([
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|numeric|min:1',
            'harga_beli' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'expired_at' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $invoice = $this->generateInvoiceNumber();

        $stok = Stock_ins::create([
            'produk_id' => $this->produk_id,
            'jumlah' => $this->jumlah,
            'harga_beli' => $this->harga_beli,
            'tanggal_masuk' => $this->tanggal_masuk,
            'expired_at' => $this->expired_at,
            'no_invoice' => $invoice,
        ]);

        $produk = Produk::find($this->produk_id);
        $produk->stok += $this->jumlah;

        $stockData = Stock_ins::where('produk_id', $produk->id);
        $total_jumlah = $stockData->sum('jumlah');
        $total_nilai = $stockData->sum(\DB::raw('jumlah * harga_beli'));

        if ($total_jumlah > 0) {
            $produk->harga_beli = round($total_nilai / $total_jumlah, 2);
        }

        $produk->save();

        $this->resetForm();

        session()->flash('message', 'Stok berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stok = Stock_ins::findOrFail($id);

        $this->stok_id = $stok->id;
        $this->produk_id = $stok->produk_id;
        $this->jumlah = $stok->jumlah;
        $this->harga_beli = $stok->harga_beli;
        $this->tanggal_masuk = $stok->tanggal_masuk;
        $this->expired_at = $stok->expired_at;
    }

    public function update()
    {
        $this->validate([
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|numeric|min:1',
            'harga_beli' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'expired_at' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $stok = Stock_ins::findOrFail($this->stok_id);
        $stok->update([
            'produk_id' => $this->produk_id,
            'jumlah' => $this->jumlah,
            'harga_beli' => $this->harga_beli,
            'tanggal_masuk' => $this->tanggal_masuk,
            'expired_at' => $this->expired_at,
        ]);

        $this->resetForm();

        session()->flash('message', 'Data stok berhasil diperbarui.');
    }

    public function delete($id)
    {
        $stok = Stock_ins::findOrFail($id);
        $stok->delete();

        session()->flash('message', 'Data stok berhasil dihapus.');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    private function resetForm()
    {
        $this->reset(['produk_id', 'jumlah', 'harga_beli', 'tanggal_masuk', 'expired_at', 'stok_id']);
        $this->tanggal_masuk = now()->format('Y-m-d');
    }

    public function render()
    {
        $produkList = Produk::all();

        $stokList = Stock_ins::with('ambilproduk')
            ->when($this->search, function ($query) {
                $query->whereHas('ambilproduk', function ($q) {
                    $q->where('nama_produk', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->tanggalFilter, function ($query) {
                $query->whereDate('tanggal_masuk', $this->tanggalFilter);
            })
            ->join('produk', 'produk.id', '=', 'stock_ins.produk_id')
            ->orderBy('produk.' . $this->sortField, $this->sortDirection)
            ->select('stock_ins.*')
            ->paginate(10);

        return view('livewire.stok-component', compact('stokList', 'produkList'));
    }
}
