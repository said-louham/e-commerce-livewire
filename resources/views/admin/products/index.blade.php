@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header p-3">
          <h4 class="d-flex justify-content-between">

                {{__('words.Products')}}
                <a href={{url('admin/product/create')}} class="btn btn-primary btn float-end">{{__('words.add product')}}</a>
            </h4>
            <h4>
                @if (session()->has('success'))
                <h4 class="alert alert-success">
                  {{  session()->get('success')}}
                @endif
            </h4>
        </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
            
                        <th>id</th>
                        <th>{{__('words.Name')}}</th>
                        <th>{{__('words.category')}}</th>
                        <th>{{__('words.Quantity')}}</th>
                        <th>{{__('words.Status')}}</th>
                        <th>{{__('words.Action')}}</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                        <tr>
                          <td>{{ $product->id }}      </td>
                          <td>{{ $product->name }}   </td>
                          <td>{{ $product->category->name }}</td>
                          <td>{{ $product->quantity }}</td>
                          <td>{{ $product->Status==0?__('words.visible'):__('words.hidden') }}</td>
                          <td class="d-flex">

                                  <a href="{{ route('product.edit', $product->id) }}" class=" ms-2 btn btn-primary btn-sm "> {{__('words.Edit')}}</a>
                                  <form action={{route('product.destroy',$product->id)}} method='POST'>
                                  @csrf
                                  @method('DELETE')
                                    <button class=" ms-2 btn btn-danger btn-sm" type="submit">  {{__('words.Delete')}} </button>                            
                                  </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                  {{$products->links()}}
            </div>
        </div>
    </div>
</div>
  
@endsection