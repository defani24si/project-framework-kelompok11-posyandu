@extends('adminlte::page')

@section('title', 'Kader Posyandu')

@section('content_header')
    <h1>Data Kader Posyandu</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-white">Daftar Kader Posyandu</h3>
            @if(Auth::check() && Auth::user()->role === 'admin')
            <div class="card-tools">
                <a href="{{ route('kader-posyandu.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> Tambah Kader
                </a>
            </div>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Kader</th>
                            <th>Posyandu</th>
                            <th>Peran</th>
                            <th>Mulai Tugas</th>
                            <th>Akhir Tugas</th>
                            <th width="130" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($kaderPosyandu as $item)
                        <tr>
                            <td>{{ ($kaderPosyandu->currentPage() - 1) * $kaderPosyandu->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->warga->nama ?? '-' }}</td>
                            <td>{{ $item->posyandu->nama ?? '-' }}</td>
                            <td>{{ $item->peran }}</td>
                            <td>{{ $item->mulai_tugas ? $item->mulai_tugas->format('d/m/Y') : '-' }}</td>
                            <td>{{ $item->akhir_tugas ? $item->akhir_tugas->format('d/m/Y') : 'Aktif' }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('kader-posyandu.show', $item->kader_id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if(Auth::check() && Auth::user()->role === 'admin')
                                    <a href="{{ route('kader-posyandu.edit', $item->kader_id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kader-posyandu.destroy', $item->kader_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="fa fa-users fa-2x mb-2"></i><br>
                                Tidak ada data kader posyandu
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer clearfix">
                {{ $kaderPosyandu->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-header {
            border-bottom: none;
            background-color: #007bff !important;
        }
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 8px;
        }
        .btn-group {
            gap: 4px;
        }
        .btn-group .btn {
            border-radius: 6px;
            padding: 0.4rem 0.8rem;
            transition: all 0.3s ease;
        }
        .btn-group .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.1);
            border-radius: 8px;
        }
    </style>
@stop