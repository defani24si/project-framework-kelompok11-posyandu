<!--

=========================================================
Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
Copyright 2021 Themesberg (https://www.themesberg.com)
License (https://themes.getbootstrap.com/licenses/)

Designed and coded by https://themesberg.com

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Login - Sistem Posyandu</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
<meta name="author" content="Themesberg">
<meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets-admin')}}/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-admin')}}/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-admin')}}/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="{{asset('assets-admin')}}/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="{{asset('assets-admin')}}/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{asset('assets-admin')}}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{asset('assets-admin')}}/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{asset('assets-admin')}}/css/volt.css" rel="stylesheet">

<!-- FontAwesome -->
<link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

<!-- Custom CSS untuk Tema Posyandu -->
<style>
    /* ===== VARIABLES POSYANDU - DIUBAH KE BIRU ===== */
    :root {
        --posyandu-primary: #3b7ddd; /* Biru tua dari konfigurasi */
        --posyandu-primary-dark: #2c6bc7; /* Biru lebih gelap */
        --posyandu-primary-light: #e3ebf7; /* Biru muda untuk sidebar */
        --posyandu-secondary: #6c757d;
        --posyandu-success: #28a745;
        --posyandu-light: #f8f9fa;
        --posyandu-blue-light: #d0e3ff; /* Biru muda */
        --posyandu-blue-dark: #1a56db; /* Biru dark */
    }

    /* ===== RESET & BASE ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', 'Roboto', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        line-height: 1.5;
        color: #333;
        font-size: 14px;
    }

    /* ===== LOGIN CONTAINER ===== */
    .login-container {
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
    }

    /* ===== LOGIN CARD ===== */
    .login-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .login-card:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    /* ===== CARD HEADER - DIUBAH KE BIRU ===== */
    .card-header {
        background: linear-gradient(135deg, #3b7ddd 0%, #2c6bc7 100%); /* Gradient biru */
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        opacity: 0.5;
    }

    .header-icon {
        position: relative;
        z-index: 1;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        width: 80px;
        height: 80px;
        line-height: 80px;
        border-radius: 50%;
        backdrop-filter: blur(5px);
    }

    .card-header h1 {
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .card-header p {
        font-size: 0.95rem;
        opacity: 0.95;
        position: relative;
        z-index: 1;
        font-weight: 300;
    }

    /* ===== CARD BODY ===== */
    .card-body {
        padding: 2rem;
    }

    /* ===== FORM ===== */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #495057;
        font-size: 0.9rem;
    }

    .input-group {
        display: flex;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
        background: white;
    }

    .input-group:focus-within {
        border-color: var(--posyandu-primary); /* Biru */
        box-shadow: 0 0 0 3px rgba(59, 125, 221, 0.15); /* Biru transparan */
    }

    .input-group-text {
        background: #f8f9fa;
        border: none;
        padding: 0.75rem 1rem;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 45px;
        border-right: 1px solid #ced4da;
    }

    .form-control {
        flex: 1;
        border: none;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        outline: none;
        background: white;
        color: #495057;
    }

    .form-control::placeholder {
        color: #adb5bd;
    }

    /* ===== CHECKBOX ===== */
    .form-check {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .form-check-content {
        display: flex;
        align-items: center;
    }

    .form-check-input {
        margin-right: 0.5rem;
        width: 1rem;
        height: 1rem;
        cursor: pointer;
        accent-color: var(--posyandu-primary); /* Biru */
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #6c757d;
        cursor: pointer;
    }

    .forgot-password {
        font-size: 0.85rem;
        color: var(--posyandu-primary); /* Biru */
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-password:hover {
        color: var(--posyandu-primary-dark); /* Biru gelap */
        text-decoration: underline;
    }

    /* ===== BUTTON - DIUBAH KE BIRU ===== */
    .btn {
        display: block;
        width: 100%;
        padding: 0.875rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b7ddd 0%, #2c6bc7 100%); /* Gradient biru */
        color: white;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2c6bc7 0%, #1a56db 100%); /* Gradient biru lebih gelap */
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(59, 125, 221, 0.3); /* Shadow biru */
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    /* ===== DIVIDER ===== */
    .divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
        color: #6c757d;
        font-size: 0.85rem;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e9ecef;
    }

    .divider span {
        padding: 0 1rem;
        background: white;
    }

    /* ===== SOCIAL LOGIN - WARNA BIRU ===== */
    .social-login {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .social-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
        border: 1px solid transparent;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .social-btn-facebook {
        background: #1877f2; /* Tetap biru Facebook */
    }

    .social-btn-twitter {
        background: #1da1f2; /* Tetap biru Twitter */
    }

    .social-btn-github {
        background: #333;
    }

    /* ===== REGISTER LINK - DIUBAH KE BIRU ===== */
    .register-link {
        text-align: center;
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 1.5rem;
    }

    .register-link a {
        color: var(--posyandu-primary); /* Biru */
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }

    .register-link a:hover {
        color: var(--posyandu-primary-dark); /* Biru gelap */
        text-decoration: underline;
    }

    /* ===== ALERTS ===== */
    .alert {
        padding: 0.875rem 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        border: 1px solid transparent;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    /* ===== TESTING ACCOUNTS - DIUBAH KE BIRU ===== */
    .testing-accounts {
        margin-top: 1.5rem;
        padding: 1.25rem;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px dashed var(--posyandu-primary-light); /* Biru muda */
        background-color: #f8fbff; /* Biru sangat muda */
    }

    .testing-accounts h6 {
        font-size: 0.9rem;
        color: var(--posyandu-primary-dark); /* Biru gelap */
        margin-bottom: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .testing-accounts h6 i {
        color: var(--posyandu-primary); /* Biru */
    }

    .account-list {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .account-item {
        font-size: 0.8rem;
        color: #6c757d;
        padding: 0.5rem;
        background: white;
        border-radius: 5px;
        border: 1px solid #e9ecef;
    }

    .account-item strong {
        color: var(--posyandu-primary-dark); /* Biru gelap */
        font-weight: 500;
    }

    /* ===== FOOTER ===== */
    .card-footer {
        padding: 1.5rem 2rem;
        border-top: 1px solid #e9ecef;
        text-align: center;
        background: #f8f9fa;
        font-size: 0.8rem;
        color: #6c757d;
    }

    .card-footer p {
        margin-bottom: 0.5rem;
    }

    .footer-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .footer-links a {
        color: #6c757d;
        text-decoration: none;
        font-size: 0.75rem;
        transition: color 0.2s;
    }

    .footer-links a:hover {
        color: var(--posyandu-primary); /* Biru */
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 480px) {
        body {
            padding: 0.75rem;
        }
        
        .login-container {
            max-width: 100%;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-header {
            padding: 1.5rem;
        }
        
        .card-header h1 {
            font-size: 1.5rem;
        }
        
        .header-icon {
            width: 60px;
            height: 60px;
            line-height: 60px;
            font-size: 2rem;
        }
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-card {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .header-icon {
        animation: float 3s ease-in-out infinite;
    }

    /* ===== UTILITY CLASSES ===== */
    .text-center {
        text-align: center;
    }
    
    .mb-3 {
        margin-bottom: 1rem;
    }
    
    .mb-4 {
        margin-bottom: 1.5rem;
    }
    
    .mt-3 {
        margin-top: 1rem;
    }
    
    .mt-4 {
        margin-top: 1.5rem;
    }
</style>
<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>
<body>
    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-0 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="{{asset('assets-admin')}}/img/illustrations/signin.svg">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 d-flex align-items-center justify-content-center">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
<script src="{{asset('assets-admin')}}/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="{{asset('assets-admin')}}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="{{asset('assets-admin')}}/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="{{asset('assets-admin')}}/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="{{asset('assets-admin')}}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src="{{asset('assets-admin')}}/vendor/chartist/dist/chartist.min.js"></script>
<script src="{{asset('assets-admin')}}/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="{{asset('assets-admin')}}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="{{asset('assets-admin')}}/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{asset('assets-admin')}}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="{{asset('assets-admin')}}/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="{{asset('assets-admin')}}/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{asset('assets-admin')}}/js/volt.js"></script>


</body>

</html>