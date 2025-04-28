@extends('layouts.app')
@section('content')
                <div class="card">
                  <div class="card-header">
                      <h4>Form Tambah User</h4>
                    </div>
                    <div class="card-body">
                    <form method="POST"action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="form-group col-6">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Masukkan nama anda" autofocus>
                            </div>
                        </div>
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                        <label for="inputEmail1" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail1" name="email" placeholder="Email">
                        </div>
                    </div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                    <div class="form-group row">
                        <label for="inputPassword1" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Password">
                        </div>
                    </div>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
@endsection
