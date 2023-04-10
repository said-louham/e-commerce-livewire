@extends('layouts.app')

@section('title', 'Thank you')

@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="p-4 shadow bg-white">
                    <img src="{{asset('admin/images/logo.svg')}}" class="mt-2" alt="logo"/>
                    <h4>Thank You for Shopping with Our Ecommerce website</h4>
                    <a href="{{url('collections')}}" class="btn btn-primary">Shop Now</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection