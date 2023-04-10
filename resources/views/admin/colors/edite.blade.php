@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            @if (session()->has('success'))
            <h4 class="alert alert-success">
              {{  session()->get('success')}}
            @endif
            <h3>
                Colors
                <a href={{url('admin/color')}} class="btn btn-primary btn float-end">Back</a>
            </h3>
            <div class="card-body">
                    <form action={{route('color.update',$color->id)}} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label > Color Name</label>
                            <input type="text" name='name' class="form-control" value={{$color->name}}>
                        </div>
                        <div class="mb-3">
                            <label > Color Code</label>
                            <input type="text" name='code' class="form-control" value={{$color->code}}>
                        </div>
                        <div class="mb-3">
                            <label > Color status</label>
                            <input type="checkbox" name='status' {{$color->status==1?'checked':''}}> checked=hidden | unchecked =visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>
  
@endsection