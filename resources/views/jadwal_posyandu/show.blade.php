@extends('adminlte::page')

@section('title', 'Detail Jadwal Posyandu')

@section('content_header')
    <h1>Detail Jadwal Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">Nama Posyandu</th>
                    <td>{{ $jadwalPosyandu->posyandu->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($jadwalPosyandu->tanggal)->format('d/m/Y') }}</td>
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
            <a href="{{ route('jadwal_posyandu.index') }}" class="btn btn-secondary">Kembali</a>
            @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('jadwal_posyandu.edit', $jadwalPosyandu->jadwal_id) }}" class="btn btn-primary">Edit</a>
            @endif
        </div>
    </div>
@stop
