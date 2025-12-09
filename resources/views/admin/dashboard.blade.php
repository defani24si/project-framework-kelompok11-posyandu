@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">Anda login sebagai: <strong>{{ ucfirst(Auth::user()->role) }}</strong></p>
                    
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i> Ini adalah halaman dashboard admin. 
                        @if(Auth::user()->role === 'admin')
                            Anda memiliki akses penuh sebagai administrator.
                        @else
                            Akses Anda terbatas sesuai dengan role Anda.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-header {
            border-bottom: none;
            background-color: #007bff !important;
            color: white;
        }
        .card-title {
            color: white !important;
            margin: 0;
        }
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
    </style>
@stop
