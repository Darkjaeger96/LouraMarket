<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
     <!-- Material Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
     <!-- CSS Files -->
     <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
     <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
     <!--Favicon-->
     <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logoAdmin.png') }}">
     <link rel="shortcut icon" sizes="192x192" href="{{ asset('assets/images/logoAdmin.png') }}">
     <!--Sweet Alert 2-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
</head>
<body>
     <div class="wrapper">
          @include('layouts.inc.sidebar')

          <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
               @include('layouts.inc.adminnav')

               <div class="content">
                   @yield('content')
               </div>

               @include('layouts.inc.adminfooter')

          </div>
     </div>

     <!-- Scripts -->
     <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/material-dashboard.js') }}" defer></script>
     <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
     
     @if (session('status'))
          <script>
               Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: '{{ session('status') }}',
                    showConfirmButton: false,
                    timer: 1500
               })
        </script>

     @endif

     @yield('scripts')

</body>
</html>
