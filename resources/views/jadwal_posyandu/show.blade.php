@extends('adminlte::page')

@section('title', 'Show Jadwal Posyandu')

@section('content_header')
    <h1>Show Jadwal Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Posyandu</th>
                    <td>{{ $jadwalPosyandu->posyandu->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($jadwalPosyandu->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Tema</th>
                    <td>{{ $jadwalPosyandu->tema }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $jadwalPosyandu->keterangan ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('jadwal_posyandu.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('jadwal_posyandu.edit', $jadwalPosyandu->jadwal_id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('jadwal_posyandu.destroy', $jadwalPosyandu->jadwal_id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data?')">Delete</button>
            </form>
        </div>
    </div>
@stop
