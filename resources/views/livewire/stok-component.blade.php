<div class="p-4">
    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Form Input --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">{{ $stok_id ? 'Edit Stok' : 'Tambah Stok' }}</h2>
        <form wire:submit.prevent="{{ $stok_id ? 'update' : 'store' }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block">Produk</label>
                <select wire:model="produk_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produkList as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->kode_produk }} - {{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
                @error('produk_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block">Jumlah</label>
                <input type="number" wire:model="jumlah" class="w-full border rounded p-2">
                @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block">Harga Beli</label>
                <input type="number" wire:model="harga_beli" step="0.01" class="w-full border rounded p-2">
                @error('harga_beli') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block">Tanggal Masuk</label>
                <input type="date" wire:model="tanggal_masuk" class="w-full border rounded p-2">
                @error('tanggal_masuk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block">Expired (Opsional)</label>
                <input type="date" wire:model="expired_at" class="w-full border rounded p-2">
                @error('expired_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block">No Invoice (Otomatis)</label>
                <input type="text" value="{{ $stok_id ? 'Tidak berubah' : $this->generateInvoiceNumber() }}" class="w-full border rounded p-2 bg-gray-100" readonly>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-green-600">
                    {{ $stok_id ? 'Update' : 'Simpan' }}
                </button>
                @if ($stok_id)
                    <button type="button" wire:click="resetForm" class="ml-2 text-gray-600 hover:underline">Batal</button>
                @endif
            </div>
        </form>
    </div>

    {{-- Filter & Search --}}
    <div class="mb-4 flex flex-wrap gap-4 items-center">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Cari nama produk..." class="border p-2 rounded w-64">

        <input type="date" wire:model="tanggalFilter" class="border p-2 rounded">
    </div>

    {{-- Table Stok --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-2 px-4 cursor-pointer" wire:click="sortBy('nama_produk')">Nama Produk</th>
                    <th class="py-2 px-4">Jumlah</th>
                    <th class="py-2 px-4">Harga Beli</th>
                    <th class="py-2 px-4">Tanggal Masuk</th>
                    <th class="py-2 px-4">Expired</th>
                    <th class="py-2 px-4">No Invoice</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stokList as $stok)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $stok->ambilproduk->nama_produk ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $stok->jumlah }}</td>
                        <td class="py-2 px-4">Rp{{ number_format($stok->harga_beli, 2, ',', '.') }}</td>
                        <td class="py-2 px-4">{{ $stok->tanggal_masuk }}</td>
                        <td class="py-2 px-4">{{ $stok->expired_at ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $stok->no_invoice }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <button wire:click="edit({{ $stok->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $stok->id }})" onclick="confirm('Yakin ingin menghapus data ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-2 px-4 text-center text-gray-500">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $stokList->links() }}
    </div>
</div>
