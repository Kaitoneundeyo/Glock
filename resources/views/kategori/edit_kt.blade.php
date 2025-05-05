@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Edit Kategori</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('kategori.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Kategori</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Masukkan nama kategori" autofocus>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="slug">URL</label>
                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $category->slug }}" placeholder="Masukkan slug URL">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
