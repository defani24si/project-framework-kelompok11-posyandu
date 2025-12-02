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
                        @foreach($posyandus as $posyandu)
                            <option value="{{ $posyandu->posyandu_id }}" {{ old('posyandu_id') == $posyandu->posyandu_id ? 'selected' : '' }}>
                                {{ $posyandu->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('posyandu_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tema -->
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" class="form-control" value="{{ old('tema') }}" required>
                    @error('tema')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jadwal_posyandu.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@stop