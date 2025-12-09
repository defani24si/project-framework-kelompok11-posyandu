@extends('layout.auth.app')
@section('content')
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
        <div class="text-center text-md-center mb-4 mt-md-0">
            <h1 class="mb-2 h3">Sistem Informasi Posyandu</h1>
            <p class="text-gray-600">Masuk untuk mengelola data kesehatan</p>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.login') }}" method="POST" class="mt-4">
            @csrf
            <!-- Email Input -->
            <div class="form-group mb-4">
                <label for="email">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light-primary border-light-primary">
                        <svg class="icon icon-xs text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </span>
                    <input type="email" name="email" class="form-control border-light-primary" placeholder="hama@email.com" id="email" autofocus>
                </div>
            </div>
            
            <!-- Password Input -->
            <div class="form-group mb-4">
                <label for="password">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-light-primary border-light-primary">
                        <svg class="icon icon-xs text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" class="form-control border-light-primary" id="password">
                </div>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label mb-0" for="remember">
                        Ingat saya
                    </label>
                </div>
                <div>
                    <a href="{{ url('/forgot-password') }}" class="small text-primary">Lupa kata sandi?</a>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #3b7ddd; border-color: #3b7ddd;">Masuk ke Sistem</button>
            </div>
        </form>
        
        <!-- Registration Link -->
        <div class="d-flex justify-content-center align-items-center mt-4">
            <span class="fw-normal">
                Belum punya akun? <a href="{{ url('/register') }}" class="fw-bold text-primary">Daftar disini</a>
            </span>
        </div>
    </div>

    <style>
        /* Warna sesuai konfigurasi Anda */
        :root {
            --primary-color: #3b7ddd; /* Biru tua */
            --light-primary-color: #e3ebf7; /* Biru muda untuk sidebar */
        }
        
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .border-primary {
            border-color: var(--primary-color) !important;
        }
        
        .bg-light-primary {
            background-color: var(--light-primary-color) !important;
        }
        
        .border-light-primary {
            border-color: var(--light-primary-color) !important;
        }
        
        .sidebar-light-primary {
            background-color: var(--light-primary-color) !important;
        }
        
        /* Tombol primary */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #2c6bc7;
            border-color: #2c6bc7;
        }
        
        /* Input focus styling */
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(59, 125, 221, 0.25);
        }
        
        /* Checkbox styling */
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Link hover */
        a.text-primary:hover {
            color: #2c6bc7 !important;
        }
        
        /* Layout */
        .fmxw-500 {
            max-width: 500px;
        }
        
        .btn-block {
            width: 100%;
        }
        
        /* Margin untuk form lebih rapi */
        .mt-4 {
            margin-top: 1.5rem !important;
        }
    </style>
@endsection