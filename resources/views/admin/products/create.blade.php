

@extends('layouts.admin')

@section('content')
<div class="card-header p-3">
    <h4 class="d-flex justify-content-between">
        {{__('words.Products')}}
        <a href={{url('admin/product')}} class="btn btn-primary btn float-end">{{__('words.back')}}</a>
    </h4>
    <h4>
        @if (session()->has('success'))
        <h4 class="alert alert-success">
          {{  session()->get('success')}}
        </h4>
        @endif
        
</div>
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action={{url('admin/product')}} method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                 {{__('words.Home')}}
            </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="seaotags-tab" data-bs-toggle="tab" data-bs-target="#seaotags-tab-pane" type="button" role="tab" aria-controls="seaotags-tab-pane" aria-selected="false">
                 {{__('words.Seo Tags')}}
                  
            </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                 {{__('words.Product  Details')}}
            </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="Images-tab" data-bs-toggle="tab" data-bs-target="#Images-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
               {{__('words.Product Images')}}
            </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                  {{__('words.Product Colors')}}
            </button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="mb-3 mt-4 ms-2">
                    <label >  {{__('words.category')}}</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
          
                <div class="mb-3 mt-4 ms-2">
                    <label >   {{__('words.Select Brand')}}</label>
                    <select name="brand" class="form-control">
                        @foreach ($Brands as $brand)
                         <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-4 ms-2">
                    <label>  {{__('words.Product Name')}}</label>
                    <input type="text"  name='name' class="form-control">
                </div>

                <div class="mb-3 mt-4 ms-2">
                    <label>  {{__('words.Product Slug')}}</label>
                    <input type="text"  name='slug' class="form-control">
                </div>

                <div class="mb-3 mt-4 ms-2">
                       <label>  {{__('words.Small description')}}</label>
                        <textarea  class="form-control" name="small_description" id="" cols="30" rows="10"></textarea>            
                </div>
                <div class="mb-3 mt-4 ms-2">
                        <label>  {{__('words.Description')}}</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>               
                 </div>

                </div>
            <div class="tab-pane fade" id="seaotags-tab-pane" role="tabpanel" aria-labelledby="seaotags-tab" tabindex="0" >
            
    
                <div class="mb-3 mt-4 ms-2">
                    <label>  {{__('words.meta_title')}}</label>
                    <textarea name="meta_title" id="" cols="30" rows="10" class="form-control"></textarea>               
             </div>
             <div class="mb-3 mt-4 ms-2">
                <label>  {{__('words.meta_keyword')}}</label>
                <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control"></textarea>               
                <div class="mb-3 mt-4 ms-2">
         </div>
            <label>  {{__('words.meta_description')}}</label>
            <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>               
       </div>
     

            </div>
         
            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
           
            <div class="mb-3 mt-4 ms-2">
                <label>  {{__('words.original_price')}}</label>
                <input type="number" name="original_price" class="form-control">
            </div>
            <div class="mb-3 mt-4 ms-2">
                <label for="">  {{__('words.selling_price')}}</label>
                <input type="number" name="selling_price" class="form-control">
            </div>
            <div class="mb-3 mt-4 ms-2">
                <label for="">  {{__('words.Quantity')}}</label>
                <input type="number" name="quantity" class="form-control">
            </div>
            <div class="mb-3 mt-4 ms-2">
                <label for="">  {{__('words.trending')}}</label>
                <input type="checkbox" name="trending" class="form-control">
            </div>
            <div class="mb-3 mt-4 ms-2">
                <label for="">  {{__('words.status')}}</label>
                <input type="checkbox" name="trending" class="form-control">
            </div>

 </div>
        <div class="tab-pane fade" id="Images-tab-pane" role="tabpanel" aria-labelledby="Images-tab" tabindex="0">
                <div class="m-3">
                    <label class="m-2" >  {{__('words.Upload Images')}}</label>
                    <input type="file" name="image[]" multiple class="form-control"/>
                </div>
        </div>
        <div class="tab-pane fade" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab" tabindex="0">
                <div class="row">
                    <label class="m-2" >  {{__('words.select color')}}</label>
                    @foreach($colors as $color)
                   <div class="col-md-3">
                    <div class="p-2 border  mb-3">
                    {{__('words.color')}}    :<input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" /> 
                    {{__('words.'.$color->name)}} 
                    <br>
                     {{__('words.Quantity')}}: <input type="number" name="colorquantity[{{$color->id}}]" style="width:70px; height:22px; border:1px solid">
                   </div>
                </div>
                    @endforeach
                </div>
        </div>
            



</div>
</div>
</div>
        <button type="submit" class="btn btn-primary">  {{__('words.save')}}</button>
    </form>
    
</div>
  
@endsection