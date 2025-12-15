@extends('adminlte::page')

@section('title', 'Catatan Imunisasi')

@section('content_header')
    <h1>Data Catatan Imunisasi</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-white">Daftar Catatan Imunisasi</h3>
            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'kader']))
            <div class="card-tools">
                <a href="{{ route('catatan-imunisasi.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> Tambah Catatan
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
                            <th>Nama Warga</th>
                            <th>Jenis Vaksin</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Nakes</th>
                            <th>Kartu Scan</th>
                            <th width="130" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($catatanImunisasi as $item)
                        <tr>
                            <td>{{ ($catatanImunisasi->currentPage() - 1) * $catatanImunisasi->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->warga->nama ?? '-' }}</td>
                            <td><span class="badge badge-primary">{{ $item->jenis_vaksin }}</span></td>
                            <td>{{ $item->tanggal ? $item->tanggal->format('d/m/Y') : '-' }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->nakes }}</td>
                            <td class="text-center">
                                @if($item->kartu_imunisasi_scan)
                                    <a href="{{ asset('storage/' . $item->kartu_imunisasi_scan) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-image"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('catatan-imunisasi.show', $item->imunisasi_id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'kader']))
                                    <a href="{{ route('catatan-imunisasi.edit', $item->imunisasi_id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @if(Auth::user()->role === 'admin')
                                    <form action="{{ route('catatan-imunisasi.destroy', $item->imunisasi_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fa fa-syringe fa-2x mb-2"></i><br>
                                Tidak ada data catatan imunisasi
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer clearfix">
                {{ $catatanImunisasi->links('pagination::bootstrap-5') }}
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
        .badge {
            font-size: 0.8rem;
            padding: 0.4em 0.8em;
        }
    </style>
@stop