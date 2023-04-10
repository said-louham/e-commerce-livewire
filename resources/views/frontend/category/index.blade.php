@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <h4 class="mb-4"> {{__('words.Our Categories')}}</h4>
                </div>
                @forelse ($categories as $category)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href={{url('collections/'.$category->slug)}}>
                            <div class="category-card-img">
                                <img src={{asset($category->image)}} class="w-100" height='150px' alt="Laptop">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$category->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                    <h4> No category Yet</h4>
                @endforelse
                         
            </div>
        </div>
    </div>
@stop
