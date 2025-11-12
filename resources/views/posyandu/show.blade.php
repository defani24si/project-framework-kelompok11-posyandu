@extends('adminlte::page')

@section('title', 'Show Posyandu')

@section('content_header')
    <h1>Show Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Posyandu</th>
                    <td>{{ $posyandu->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $posyandu->alamat }}</td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>{{ $posyandu->rt }}</td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>{{ $posyandu->rw }}</td>
                </tr>
                <tr>
                    <th>Kontak</th>
                    <td>{{ $posyandu->kontak }}</td>
                </tr>
            </table>
            <a href="{{ route('posyandu.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop