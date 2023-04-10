@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header p-3">
            <h4 class="d-flex justify-content-between">
                {{__('words.slider')}}
                <a href={{url('admin/slider')}} class="btn btn-primary btn float-end">{{__('words.back')}}</a>
            </h4>
            <h4>
                @if (session()->has('success'))
                <h4 class="alert alert-success">
                  {{  session()->get('success')}}
                @endif
            </h4>
        </div>
            
            <div class="card-body">
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>{{__('words.title')}}</label>
                    <input type="text" name="title" class="form-control">
                    @error('title') <small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="mb-3">
                    <label> {{__('words.description')}}</label>
                    <textarea name="description" id=""  rows="3" class="form-control"></textarea>
                    @error('description') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="mb-3">
                    <label>{{__('words.Image')}}</label>
                  <input type="file" name="image" class="form-control">
                  @error('image') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="mb-3">
                    <label>{{__('words.status')}}</label>
                  <input type="checkbox" name="status" > checked={{__('words.hidden')}}
                </div>
                <div class="mb-3">
               
                  <input type="submit" class="btn btn-primary" value={{__('words.save')}}> 
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
  
@endsection