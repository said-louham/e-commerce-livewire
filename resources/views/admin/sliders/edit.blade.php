@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header p-3">
                <h3>
                    Slider
                    <a href={{ url('admin/slider') }} class="btn btn-primary btn float-end">Back</a>
                </h3>
                <h4>
                    @if (session()->has('success'))
                        <h4 class="alert alert-success">
                            {{ session()->get('success') }}
                    @endif
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value={{$slider->title}}>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>description</label>
                        <textarea name="description" id="" rows="3" class="form-control">{{$slider->title}}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img  src={{asset($slider->image)}} width='100px' class='mt-3' >

                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label>status</label>
                        <input type="checkbox" name="status" {{$slider->status==1?'checked':''}}> checked=hidden | unchecked=visible
                    </div>
                    <div class="mb-3">

                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
