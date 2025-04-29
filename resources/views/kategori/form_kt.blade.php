@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Tambah Kategori</h4>
    </div>
<div class="card-body">
        <form method="POST" action="{{ route('kategori.store') }}">
            @csrf 

            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Masukkan nama anda" autofocus>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group row">
                <div class="form-group col-6">
                    <label for="slug">Kategori</label>
                    <input id="kategori" type="text" class="form-control" name="slug" placeholder="Masukkan Jenis Makanannya">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    @endsection