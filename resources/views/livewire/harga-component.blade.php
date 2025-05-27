<div class="overflow-x-auto bg-white shadow-md rounded p-4">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="bg-transparent card-rounded p-1 mb-3 row">
                <h2 class="text-2xl font-semibold text-gray-800">FORM ISIAN</h2>
            </div>
            <form wire:submit.prevent="{{ 'store' }}">
                <div class="mb-3 row">
                    <label for="produk_id" class="col-sm-2 col-form-label text-black">Produk</label>
                    <div class="col-sm-10">
                        <select id="produk_id" wire:model="produk_id"
                            class="form-control">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produkList as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                        @error('produk_id') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga_jual" class="col-sm-2 col-form-label text-black">Harga Jual</label>
                    <div class="col-sm-10">
                        <input wire:model="harga_jual" type="number" class="form-control"
                            placeholder="isi harga jual....">
                        @error('harga_jual') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga_promo" class="col-sm-2 col-form-label text-black">Harga Promo</label>
                    <div class="col-sm-10">
                        <input wire:model="harga_promo" type="number" class="form-control"
                            placeholder=" opsional harga promo...">
                        @error('harga_promo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_mulai_promo" class="col-sm-2 col-form-label text-black">Mulai Promo</label>
                    <div class="col-sm-10">
                        <input wire:model="tanggal_mulai_promo" type="date" class="form-control">
                        @error('tanggal_mulai_promo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_selesai_promo" class="col-sm-2 col-form-label text-black">Akhir Promo</label>
                    <div class="col-sm-10">
                        <input wire:model="tanggal_selesai_promo" type="date" class="form-control">
                        @error('tanggal_selesai_promo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mb-2 float-right">
                    <button type="submit" class="btn btn-primary">{{ 'Simpan' }}</button>
                </div>
            </form>

        </div>
