@extends('layouts.app')
@section('title', $category->meta_title)
@section('meta_keyword', $category->meta_keyword)
@section('description', $category->meta_description)


@section('content')
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h4 class="mb-4">{{__('words.Our Products')}}</h4>
                    </div>
                <livewire:front-end.products.index   :category="$category" :products="$products" />
                </div>
            </div>
        </div>
@endsection