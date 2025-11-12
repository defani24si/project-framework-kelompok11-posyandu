@extends('adminlte::page')

@section('title', 'Create Jadwal Posyandu')

@section('content_header')
    <h1>Create Jadwal Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jadwal_posyandu.store') }}" method="POST">
                @csrf

                <!-- Pilih Posyandu -->
                <div class="form-group">
                    <label for="posyandu_id">Posyandu</label>
                    <select name="posyandu_id" class="form-control" required>
                        <option value="">-- Pilih Posyandu --</option>
                        <option value="1">Posyandu Melati</option>
                        <option value="2">Posyandu Mawar</option>
                        <option value="3">Posyandu Anggrek</option>
                        <option value="4">Posyandu Kamboja</option>
                        <option value="5">Posyandu Flamboyan</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>

                <!-- Tema -->
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" class="form-control" value="{{ old('tema') }}" required>
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jadwal_posyandu.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@stop
