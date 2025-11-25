@extends('adminlte::page')

@section('title', 'Detail Jadwal Posyandu')

@section('content_header')
    <h1>Detail Jadwal Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
           <p><strong>Nama Posyandu:</strong> {{ $jadwal->posyandu?->nama_posyandu ?? 'Data Posyandu Tidak Ditemukan' }}</p>
           <p><strong>Tanggal:</strong> {{ $jadwal->tanggal }}</p>
           <p><strong>Waktu:</strong> {{ $jadwal->waktu }}</p>

        </div>
    </div>
@stop
