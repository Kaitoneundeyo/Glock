<div class="container mx-auto p-4 bg-secondary rounded shadow">
    <h2 class="text-2xl font-semibold mb-6 text-black">Form {{ $stok_id ? 'Edit' : 'Tambah' }} Stok</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-medium">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $stok_id ? 'update' : 'store' }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-1 font-medium text-black">Kode Produk</label>
                <select wire:model="produk_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produkList as $produk)
                        <option value="{{ $produk->id }}">
                            {{ $produk->kode_produk }} - {{ $produk->nama_produk }}
                        </option>
                    @endforeach
                </select>
                @error('produk_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Jumlah</label>
                <input type="number" wire:model="jumlah" class="w-full border rounded p-2" />
                @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Harga Beli</label>
                <input type="number" wire:model="harga_beli" class="w-full border rounded p-2" />
                @error('harga_beli') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Tanggal Masuk</label>
                <input type="date" wire:model="tanggal_masuk" class="w-full border rounded p-2" />
                @error('tanggal_masuk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Kedaluarsa</label>
                <input type="date" wire:model="expired_at" class="w-full border rounded p-2" />
                @error('expired_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">No Invoice</label>
                <input type="text" wire:model="no_invoice" class="w-full border rounded p-2 bg-gray-100" disabled />
            </div>
        </div>

        <div class="mb-6 flex space-x-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded">
                {{ $stok_id ? 'Update' : 'Simpan' }}
            </button>

            @if($stok_id)
                <button type="button" wire:click="mount" class="btn btn-outline-primary text-black rounded">
                    Batal
                </button>
            @endif
        </div>
    </form>

    <hr class="my-6 border-gray-300" />

    <h2 class="text-2xl font-semibold mb-4 text-black">Data Stok</h2>

    {{-- Filter dan Sort --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
        <div class="flex gap-2">
            <input type="text" wire:model="search" placeholder="Cari nama produk..."
                   class="border p-2 rounded w-64" />
            <input type="date" wire:model="tanggalFilter" class="border p-2 rounded" />
        </div>

        <div class="flex gap-2 items-center">
            <label class="text-sm font-medium text-black">Urutkan:</label>
            <button wire:click="sortBy('nama_produk')" class="text-blue-600 hover:underline">
                ({{ $sortDirection === 'asc' ? 'A-Z' : 'Z-A' }})
            </button>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-blue-300 bg-white">
            <thead class="bg-blue-600 text-black">
                <tr class="text-center">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Kode</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Jumlah</th>
                    <th class="px-4 py-2 border">Harga Beli</th>
                    <th class="px-4 py-2 border">Tanggal Masuk</th>
                    <th class="px-4 py-2 border">Kedaluarsa</th>
                    <th class="px-4 py-2 border">No Invoice</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stokList as $index => $value)
                    <tr class="border-t">
                        <td class="px-4 py-2 border text-black">{{ $stokList->firstItem() + $index }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->ambilproduk->kode_produk ?? '-' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->ambilproduk->nama_produk ?? '-' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->jumlah }}</td>
                        <td class="px-4 py-2 border text-black">Rp{{ number_format($value->harga_beli, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->tanggal_masuk }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->expired_at ?? '-' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $value->no_invoice }}</td>
                        <td class="px-4 py-2 border text-center">
                            <button wire:click="edit({{ $value->id }})"
                                class="btn btn-sm btn-warning text-white mb-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="delete({{ $value->id }})"
                                class="btn btn-sm btn-danger text-white"
                                title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $stokList->links() }}
    </div>
</div>
