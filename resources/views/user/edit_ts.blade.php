@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Tambah User</h4>
    </div>
    <div class="card-body">
        <form action="{{route ('user.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control" name="name" value= "{{$data->name}}" placeholder="Masukkan nama anda" autofocus>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value= "{{$data->email}}" placeholder="Masukkan email anda">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-6">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
