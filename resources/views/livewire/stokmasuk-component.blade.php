<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            <div class="mb-3 row">
                <label for="no_invoice" class="col-sm-2 col-form-label text-black">Nomor Invoice</label>
                <div class="col-sm-10">
                    <input wire:model="no_invoice" type="text" class="form-control bg-light" readonly>
                    @error('no_invoice') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label text-black">Tanggal Masuk</label>
                <div class="col-sm-10">
                    <div class="form-control bg-light">{{ $tanggal_masuk }}</div>
                    <input type="hidden" wire:model="tanggal_masuk">
                    @error('tanggal_masuk') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="supplier_id" class="col-sm-2 col-form-label text-black">Nama Supplier</label>
                <div class="col-sm-10">
                    <select class="form-control" id="supplier_id" wire:model="supplier_id">
                        <option value="">-- Pilih Supplier --</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier ?? 'Tanpa Penyalur' }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-2">
            <button class="btn btn-primary">{{ 'Simpan' }}</button>
            @if($isEdit)
                <button type="button" class="btn btn-secondary" wire:click="resetForm">Batal</button>
            @endif
        </div>
        </form>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row mt-20 mb-8">
            <div class="col-md-3">
            <input type="date" class="form-control" wire:model="filterTanggalMasuk" placeholder="Filter Tanggal Masuk">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" wire:model="filterNoInvoice" placeholder="Cari No Invoice">
        </div>
        <div class="col-md-3">
            <select class="form-control" wire:model="filterSupplier">
                <option value="">Semua Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
    </div>



    <div class="table-responsive bg-secondary text-nowrap">
        <table class="table table-bordered text-center text-black">
            <thead class="bg-blue-400">
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
                        <button wire:click="edit({{ $value->id }})" class="btn btn-sm btn-warning">Edit</button>
                        <button wire:click="delete({{ $value->id }})" class="btn btn-sm btn-danger"
                            onclick="confirm('Yakin ingin menghapus?') || event.stopImmediatePropagation()">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
