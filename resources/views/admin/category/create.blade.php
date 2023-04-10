@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4 class="d-flex justify-content-between">
                {{ __('words.category') }}
                <a href={{url('admin/category')}} class="btn btn-primary  ">{{ __('words.add_category') }}</a>

            </h4>
                <div class="card-body">
                    <form class="category-form" action="{{route('category.store')}}"  method='POST' enctype="multipart/form-data"
                    dir="{{ LaravelLocalization::getCurrentLocaleDirection()}}">
                        @csrf
                    <div class="row">
                            <div class="col mb-3">
                                <label>{{__('words.name')}}</label>
                                <input type="text" name="name" class="form-control" id="">
                               @error('name')
                               <small class="text-danger">{{$message}}</small>
                               @enderror 
                            </div>
                            <div class="col mb-3">
                                <label>{{__('words.slug')}}</label>
                                <input type="text" name="slug" class="form-control" id="">
                                @error('slug')
                                <small class="text-danger">{{$message}}</small>
                                @enderror 
                            </div>
                   </div>
                        <div class="col-md-12 mb-3">
                            <label>{{__('words.description')}}</label>
                            <input type="text" name="description" class="form-control" rows="3" >
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                       <div class="row">
                      
                        <div class="col-md-6 mb-3">
                            <label>{{__('words.image')}}</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>{{__('words.status')}}</label>
                            <input type="checkbox" name="status" class="form-control" style="width: 50px" id="">
                        </div>
            </div>
                        <div class="col-md-12 mb-3">
                            <label>{{__('words.meta_title')}}</label>
                            <input type="text" name="meta_title" class="form-control" id="">
                            @error('meta_title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>{{__('words.meta_keyword')}}</label>
                            <input type="text" name="meta_keyword" class="form-control" id="">
                            @error('meta_keyword')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>{{__('words.meta_description')}}</label>
                            <input type="text" name="meta_description" class="form-control" id="">
                            @error('meta_description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror 
                        </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary">{{__('words.save')}}</button>
                            </div>
                </div>
                    </form>
                </div>
        </div>
    </div>
</div>
  
@endsection

