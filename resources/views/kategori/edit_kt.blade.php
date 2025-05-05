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
            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="name">Kategori</label>
                    <input id="name" type="text" class="form-control" name="name" value= "{{$cat->name}}" placeholder="Masukkan nama anda" autofocus>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group row">
                <div class="form-group col-6">
                    <label for="slug">URL</label>
                    <input id="kategori" type="text" class="form-control" name="slug" value= "{{$cat->slug}}" placeholder="Masukkan Jenis Makanannya">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    @endsection
