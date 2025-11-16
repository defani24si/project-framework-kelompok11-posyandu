@extends('adminlte::page')

@section('title', 'Edit Jadwal Posyandu')

@section('content_header')
    <h1>Edit Jadwal Posyandu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jadwal_posyandu.update', $jadwalPosyandu->jadwal_id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Pilih Posyandu -->
                <div class="form-group">
                    <label for="posyandu_id">Posyandu</label>
                    <select name="posyandu_id" class="form-control" required>
                        <option value="">-- Pilih Posyandu --</option>
                        @foreach($posyandus as $posyandu)
                            <option value="{{ $posyandu->posyandu_id }}"
                                {{ $jadwalPosyandu->posyandu_id == $posyandu->posyandu_id ? 'selected' : '' }}>
                                {{ $posyandu->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ old('tanggal', $jadwalPosyandu->tanggal) }}" required>
                </div>

                <!-- Tema -->
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" class="form-control"
                        value="{{ old('tema', $jadwalPosyandu->tema) }}" required>
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan', $jadwalPosyandu->keterangan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('jadwal_posyandu.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@stop