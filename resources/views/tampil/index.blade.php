@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>HOME</h1>
        </div>
        <div>
           @livewire('katalog-component')
        </div>

@endsection
