@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            @if (session()->has('success'))
            <h4 class="alert alert-success">
              {{  session()->get('success')}}
            </h4>
            @endif
            <h4 class="d-flex justify-content-between">
                {{__('words.category')}}
                <a href={{url('admin/category/create')}} class="btn btn-primary btn float-end">{{__('words.add_category')}}</a>
            </h4>
            <div class="card-body">
                               <livewire:admin.category.index/>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection