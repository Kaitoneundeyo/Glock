@extends('layouts.app')
@section('content')
<section class="section">
          <div class="section-header">
            <h1>DataPegawai</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataPegawai</div>
            </div>
            </div>
            @livewire('manage-user')
        </section>
@endsection
