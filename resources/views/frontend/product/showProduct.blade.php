
@extends('layouts.app')
@section('title', $product->meta_title)
{{-- @section('meta_keyword', $product->meta_keyword) --}}
@section('description', $product->meta_description)


@section('content')       
                    <livewire:front-end.products.show :category="$category" :product="$product" />
@endsection

