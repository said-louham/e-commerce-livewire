<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-bqte3CKr0eVbX8dHmR2mZ1wvUcW6U8/6kiy12+Uyv+jJpZZDxb16WW6UCNdyO+ZswvTcTbT+LCOekJomHtLbOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name">Funda Ecom</h5>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input type="search" placeholder={{__('words.Search your product')}} class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-cart"></i> {{__('words.Cart')}} (0)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-heart"></i> {{__('words.Wishlist')}} (0)
                                </a>
                            </li>
    
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                    
                           @if (auth()->check())
                                @if(auth()->user()->role_as=='1')
                                <li class="nav-item">
                                    <a class="nav-link" href={{url('admin/dashbord')}}>
                                        <i class="fa fa-heart"></i>  {{__('words.Admin')}}
                                    </a>
                                </li>
                                @endif
                               
                           @endif
    
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('words.Login') }}</a>
                                        </li>
                                    @endif
        
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('words.Register') }}</a>
                                        </li>
                                    @endif
                                @else
                    
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                            <i class="fa fa-user"></i> 
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> {{__('words.Profile')}}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> {{__('words.My Orders')}}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>   {{__('words.My Wishlist')}}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> {{__('words.My Cart')}}</a></li>
                                <li>
                                    <a class="dropdown-item "  href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                                 <i class="fa fa-sign-out">   {{ __('words.Logout') }}
                                 </a>
    
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </li>
                                </ul>
                            </li>
                            @endguest
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Funda Ecom
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href={{url('/')}}> {{__('words.Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('/collections')}}> {{__('words.All Categories')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> {{__('words.New Arrivals')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> {{__('words.Featured Products')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('words.Electronics')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('words.Fashions')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('words.Accessories')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('words.Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('words.Appliances')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-40oR5KpekuXNpLlW3qP0rIHPrsK3wW5jJGAvYE4g/2m4alGs1sFq8NpCmIqtKtT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/umd/popper.min.js" integrity="sha384-WmE1mFhDvRmL2LywP3JvoCtKkmDR9bweGFO3qzhJdSzjKluzRASvSYQ+oO4j0hJd" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-xrDm07j+GwV5v5JyF/6zcyU8+h/87QOvU6ZfJ6xhU6IaL6Mj+eWrSX+mIzygC+u8" crossorigin="anonymous"></script> --}}

    
</body>
</html>