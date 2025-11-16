@extends('adminlte::page')

@section('title', 'Jadwal Posyandu')

@section('content_header')
    <h1>Jadwal Posyandu</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('jadwal_posyandu.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>
        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="60">ID</th>
                        <th>Posyandu</th>
                        <th>Tanggal</th>
                        <th>Tema</th>
                        <th>Keterangan</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($jadwals as $item)
                    <tr>
                        <td>{{ $item->jadwal_id }}</td>
                        <td>{{ $item->posyandu->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->tema }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('jadwal_posyandu.edit', $item) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('jadwal_posyandu.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No data</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $jadwals->links() }} {{-- Pagination Laravel --}}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#crudTable').DataTable({
                "paging": false, // Matikan paging karena sudah pakai pagination Laravel
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "info": false,
                "searching": true
            });
        });
    </script>
@stop