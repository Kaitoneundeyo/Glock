<div class="card">
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="card-body">
        <div class="mb-3">
            <label>No Invoice</label>
            <input type="text" class="form-control" wire:model="no_invoice" readonly>
        </div>

        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" class="form-control" wire:model="tanggal_masuk" readonly>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select class="form-control" wire:model="supplier_id">
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $isEdit ? 'Update' : 'Simpan' }}
        </button>
        @if($isEdit)
            <button type="button" class="btn btn-secondary" wire:click="resetForm">Batal</button>
        @endif
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mx-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="row px-3 mt-4 mb-2">
        <div class="col-md-3 mb-2">
            <input type="date" class="form-control" wire:model="filterTanggalMasuk" placeholder="Filter Tanggal Masuk">
        </div>
        <div class="col-md-3 mb-2">
            <input type="text" class="form-control" wire:model="filterNoInvoice" placeholder="Cari No Invoice">
        </div>
        <div class="col-md-3 mb-2">
            <select class="form-control" wire:model="filterSupplier">
                <option value="">Semua Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="table-responsive px-3 pb-4">
        <table class="table table-bordered text-center text-black">
            <thead class="bg-blue-400 text-white">
                <tr>
                    <th>No</th>
                    <th>Nomor Invoice</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stokMasuks as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->no_invoice }}</td>
                        <td>{{ $value->tanggal_masuk }}</td>
                        <td>{{ $value->supplier->nama_supplier ?? 'Tanpa Penyalur' }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button wire:click="edit({{ $value->id }})" class="btn btn-sm btn-warning text-white mb-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ $value->id }})" class="btn btn-sm btn-danger text-white" title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
