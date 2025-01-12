<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') .' - '. $title ?? config('app.name') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="icon" href="{{ asset('assets/images/logo/logo-inventory.png') }}" type="image/png">

  @stack('styles')
</head>

<body>
  @auth

    <!-- Menampilkan Sidebar berdasarkan peran pengguna -->
    @if(auth()->user()->hasRole('admin'))
    <x-admin.sidebar />
    @elseif(auth()->user()->hasRole('staff'))
    <x-staff.sidebar />
    @elseif (auth()->user()->hasRole('customer'))
    <x-customer.sidebar />
    @endif
    <!-- Menampilkan Navbar berdasarkan peran pengguna -->
    @if(auth()->user()->hasRole('admin'))
    <x-admin.navbar />
    @elseif(auth()->user()->hasRole('staff'))
    <x-staff.navbar />
    @elseif (auth()->user()->hasRole('customer'))
    <x-customer.navbar />
    @endif

  @endauth
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        {{ $slot }}
      </div>
    </section>
  </div>

  <!-- Page Specific JS File -->
  @stack('scripts')
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  @stack('lastScripts')
</body>

</html>
