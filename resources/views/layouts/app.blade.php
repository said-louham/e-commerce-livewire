<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content=@yield('meta_description')>
    <meta name="keywords" content=@yield('meta_keyword')>
    <meta name="author" content="Said Louham">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src={{asset('assets/js/bootstrap.bundle.min.js')}}></script>
    
    {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"> --}}



{{-- -------------------------------------------------------------------------------- --}}
{{-- alertify js --}}

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>




{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-kBSzWwY8nfd5vlZ+v/y0dG7/vDgkzeKnK9XetPdMfUbTXLaFwq3Q2+lRGVN1OmlS2mvVWcklKkGW7VAKyepd4w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-KZhLb0iD+gSPwD0RaxW+zYu8muIQ1E3qgTX9MIRIr5Z5/E5L5YRgrw/0nSYFvkW8nNpE1q3+18K5lNfcW8hH5Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-LZhC6UTiBI1sHjGy9rTmqJdV7fU/HkxOrZw8fvcW50R63GmhJd/s/fU6sh9u6Wsv/qV7efuqz0Z2JFZDjfMS7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>


    <script src={{asset("assets/js/bootstrap.min.js")}}></script>
    {{-- alertify js  --}}
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    window.addEventListener("notification",event=>{
        alertify.set("notifier","position","buttom-right");
        alertify.notify(event.detail.text  ,   event.detail.type)
    })
</script>








    {{-- <script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script> --}}
    @livewireScripts
    @stack('scripts') {{-- push  scripts  from livewire Components --}}
    
</body>
</html>
