@extends('adminlte::page')

@section('title', 'Create Posyandu')

@section('content_header')
    <h1>Create Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posyandu.store') }}" method="POST">
    @csrf
    @include('posyandu.partials.form')  <!-- TANPA 's' -->
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('posyandu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
        </div>
    </div>
@stop