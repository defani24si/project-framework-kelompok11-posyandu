@extends('adminlte::page')

@section('title', 'Edit Posyandu')

@section('content_header')
    <h1>Edit Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posyandu.update', $posyandu->posyandu_id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('posyandu.partials.form')  <!-- TANPA 's' -->
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('posyandu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
        </div>
    </div>
@stop