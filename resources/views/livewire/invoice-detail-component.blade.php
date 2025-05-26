<div class="overflow-x-auto bg-white shadow-md rounded p-4">
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6 shadow-sm">
        <h2 class="text-2xl font-semibold text-gray-800">Detail Invoice</h2>
        <div class="mt-3 text-base text-gray-700 space-y-1">
            <p><strong>No Invoice:</strong> {{ $invoice->no_invoice }}</p>
            <p><strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($invoice->tanggal_masuk)->format('d M Y') }}</p>
        </div>
    </div>
    <form wire:submit.prevent="store">
        <tr>
            {{-- <td class="px-4 py-2">
                <select wire:model="produk_id" class="w-full border rounded px-2 py-1">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produkList as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
                @error('produk_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </td> --}}
            <td class="px-4 py-4">
                <div class="flex items-center space-x-3 my-5">
                    <label for="jumlah" class="w-28 text-sm font-medium text-gray-700">Jumlah</label>
                    <input type="number" id="jumlah" wire:model="jumlah" class="flex-1 border rounded px-2 py-1">
                </div>
                @error('jumlah') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </td>

            {{-- Harga Beli --}}
            <td class="px-4 py-4">
                <div class="flex items-center space-x-3 my-5">
                    <label for="harga_beli" class="w-28 text-sm font-medium text-gray-700">Harga Beli</label>
                    <input type="number" id="harga_beli" wire:model="harga_beli"
                        class="flex-1 border rounded px-2 py-1">
                </div>
                @error('harga_beli') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </td>

            {{-- Tanggal Expired --}}
            <td class="px-4 py-4">
                <div class="flex items-center space-x-3 my-5">
                    <label for="expired_at" class="w-28 text-sm font-medium text-gray-700">Expired</label>
                    <input type="date" id="expired_at" wire:model="expired_at" class="flex-1 border rounded px-2 py-1">
                </div>
                @error('expired_at') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </td>

            {{-- Tombol --}}
            <td class="px-4 py-4 align-bottom text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-6">
                    Tambah
                </button>
            </td>
        </tr>
    </form>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
        </thead>

        <tbody>

        </tbody>
    </table>
</div>
