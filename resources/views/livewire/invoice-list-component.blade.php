<div class="p-4">
    <table class="table-auto w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 border">NO</th>
                <th class="px-4 py-2 border">Nomor Invoice</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $invoice->no_invoice }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($invoice->tanggal)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('item.index', ['id' => $invoice->id]) }}" class="text-blue-500 hover:underline">Detail</a>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center px-4 py-2">Belum ada invoice</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
