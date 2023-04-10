<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href={{asset('assets/css/bootstrap.min.css')}}>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- plugins:css -->
  <link rel="stylesheet" href={{ asset("admin/vendors/mdi/css/materialdesignicons.min.css")}}>
  <link rel="stylesheet" href={{ asset("admin/vendors/base/vendor.bundle.base.css")}}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href={{ asset("admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}>
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset("admin/css/style.css")}}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ asset("admin/images/favicon.png")}} />
{{-- ----------------------------------------------------------------------------- --}}


        @livewireStyles

    </head>
    <body class="font-sans antialiased">
          @include('layouts.admin.navbar')
        <div class="container-fluid page-body-wrapper" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
          @include('layouts.admin.sidebar')
          
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>






        <div class="container-scroller">

        <script src={{asset("admin/vendors/base/vendor.bundle.base.js")}}></script>
        <script src={{asset("admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js")}}></script>
        <script src={{asset("admin/vendors/datatables.net/jquery.dataTables.js")}}></script>
        
        <script src={{asset("admin/js/off-canvas.js")}}></script>
          <script src={{asset("admin/js/hoverable-collapse.js")}}></script>
          <script src={{asset("admin/js/template.js")}}></script>
        
          <script src={{asset("admin/js/dashboard.js")}}></script>
          <script src={{asset("admin/js/data-table.js")}}></script>
          <script src={{asset("admin/js/jquery.dataTables.js")}}></script>
          <script src={{asset("admin/js/dataTables.bootstrap4.js")}}></script>
          <script src={{asset("assets/js/bootstrap.min.js")}}></script>
          
          {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
          {{-- alertify js --}}

          @yield('scripts')
        @livewireScripts
        @stack('script')
    </body>
</html>