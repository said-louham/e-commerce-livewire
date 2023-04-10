<nav class="sidebar sidebar-offcanvas" id="sidebar" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <ul class="nav">
      {{-- {{dd(LaravelLocalization::getCurrentLocaleDirection() )}} --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url(App::getLocale().'/admin/dashbord')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">{{__('words.dashboard')}}</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title"> {{__('words.category')}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li  dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">{{__('words.all categories')}}</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> --}}
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-brands" aria-expanded="false" aria-controls="ui-brands">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">{{__('words.brands')}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-brands">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url(App::getLocale().'/admin/brands')}}">{{__('words.all brands')}}</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-posts" aria-expanded="false" aria-controls="ui-posts">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title"> {{__('words.product')}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-posts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url(App::getLocale().'/admin/product/create')}}">{{__('words.add product')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url(App::getLocale().'/admin/product')}}"> {{__('words.all products')}}</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url(App::getLocale().'/admin/order')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">{{__('words.orders')}}</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="{{url(App::getLocale().'/admin/color')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">{{__('words.colors')}}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-slider" aria-expanded="false" aria-controls="ui-slider">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title"> {{__('words.slider')}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-slider">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url(App::getLocale().'/admin/slider/create')}}">{{__('words.add slider')}}</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url(App::getLocale().'/admin/slider')}}">{{__('words.all sliders')}}</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>