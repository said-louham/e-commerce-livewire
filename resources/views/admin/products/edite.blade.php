@extends('layouts.admin')

@section('content')
    <div class="card-header p-3">
        <h4>
            @if (session()->has('success'))
                <h4 class="alert alert-success">
                    {{ session()->get('success') }}
            @endif
        </h4>
        <h4 class="d-flex justify-content-between">
            Product
            <a href={{ url('admin/product') }} class="btn btn-primary btn float-end">Back</a>
        </h4>
       
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

            <form action={{ route('product.update', $product->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            Home
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seaotags-tab" data-bs-toggle="tab" data-bs-target="#seaotags-tab-pane"
                            type="button" role="tab" aria-controls="seaotags-tab-pane" aria-selected="false">
                            Seo Tags
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane"
                            type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Details
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Images-tab" data-bs-toggle="tab" data-bs-target="#Images-tab-pane"
                            type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Images
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane"
                            type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Product Color
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <div class="mb-3 mt-4 ms-2">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-4 ms-2">
                            <label> Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($Brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $product->brand == $brand->name ? 'checked' : '' }}>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-4 ms-2">
                            <label>Product Name</label>
                            <input type="text" name='name' class="form-control" value="{{ $product->name }}">
                        </div>

                        <div class="mb-3 mt-4 ms-2">
                            <label>Product Slug</label>
                            <input type="text" name='slug' class="form-control" value="{{ $product->slug }}">
                        </div>

                        <div class="mb-3 mt-4 ms-2">
                            <label>Small description</label>
                            <textarea class="form-control" name="small_description" id="" cols="30" rows="10">{{ $product->small_description }}</textarea>
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label>Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="seaotags-tab-pane" role="tabpanel" aria-labelledby="seaotags-tab"
                        tabindex="0">


                        <div class="mb-3 mt-4 ms-2">
                            <label>meta title</label>
                            <textarea name="meta_title" id="" cols="30" rows="10" class="form-control">{{ $product->meta_title }}</textarea>
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label>meta keyword</label>
                            <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control">{{ $product->meta_keyword }}</textarea>
                            <div class="mb-3 mt-4 ms-2">
                            </div>
                            <label>meta description</label>
                            <textarea name="meta_description" id="" cols="30" rows="10" class="form-control">{{ $product->meta_description }}</textarea>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                        tabindex="0">

                        <div class="mb-3 mt-4 ms-2">
                            <label>original price</label>
                            <input type="number" name="original_price" class="form-control"
                                value="{{ $product->original_price }}">
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label for="">selling_price</label>
                            <input type="number" name="selling_price" class="form-control"
                                value="{{ $product->selling_price }}">
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label for="">quantity</label>
                            <input type="number" name="quantity" class="form-control"
                                value="{{ $product->quantity }}">
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label for="">trending</label>
                            <input type="checkbox" name="trending" class="form-control"
                                value="{{ $product->trending }}">
                        </div>
                        <div class="mb-3 mt-4 ms-2">
                            <label for="">status</label>
                            <input type="checkbox" name="trending" class="form-control"
                                {{ $product->status == 1 ? 'checked' : '' }}>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="Images-tab-pane" role="tabpanel" aria-labelledby="Images-tab"
                        tabindex="0">
                        <div class="m-3">
                            <label class="m-2">Upload Images</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>

                        <div class="row">
                            <div class="m-3 row">
                                @if (count($product->productImages) > 0)
                                    @foreach ($product->productImages as $item)
                                        <div class="col-md-2">
                                            <img src='{{ asset($item->image) }}' class="me-4 border" width="100px"
                                                height='100px'>
                                            <a href={{ route('remove.product_image', $item->id) }}>Remove</a>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>No image</h3>
                                @endif
                            </div>
                        </div>
                    </div>




                    <div class="tab-pane fade" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab"
                        tabindex="0">
                        <div class="row">
                            <h3 class="ms-4 mt-3">Add Product Color</h3>
                            <label class="m-2">select color</label>
                            @foreach ($colors as $color)
                                <div class="col-md-3">
                                    <div class="p-2 border  mb-3">
                                        Color :<input type="checkbox" name="colors[{{ $color->id }}]"
                                            value="{{ $color->id }}" />
                                        {{ $color->name }}
                                        <br>
                                        Quantity: <input type="number" name="colorquantity[{{ $color->id }}]"
                                            style="width:70px; height:22px; border:1px solid">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>


                        @if( count($product->productColor ) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>color Name</th>
                                    <th>Quantity</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product->productColor as $item)
                                    <tr class="prod-color-tr">
                                        <td>{{ $item->color->name }} </td>
                                        <td>
                                            <div class="row">
                                                <input value="{{ $item->quantity }}" type="text" name="quantity"
                                                 class="ProductColorQuantity form-control">
                                                <button value="{{ $item->id }}" type="button" class=" updateColorBtn btn btn-primary btn-sm" >Update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$item->id}}" class="deleteColorBtn btn btn-danger btn-sm" > Delete </button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
    @endif
                    </div>

                </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">save</button>

    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
        
        $('.updateColorBtn').on('click',function(){
            var product_id='{{ $item->id }}';
            var product_color_id=$(this).val();
            //                       tr class               input class 
            var qty=$(this).closest('.prod-color-tr').find('.ProductColorQuantity').val();
            console.log('qty',qty);

            if(qty<=0){
                 alert('Quantity is required')
                 return false;
            }
            var data ={
                'product_id':product_id,
                'qty':qty
            };
        $.ajax({
            type:'POST',
            url:'/admin/product-color/'+product_color_id,
            data:data,
            success:function(res){
                alert(res.message)
            }
        })
        })

       // delete 
        $('.deleteColorBtn').on('click',function(){
            var prod_color_id=$(this).val();
            console.log('prod_color_id'+prod_color_id);
            var thisClick=$(this);
            $.ajax({
                type:'GET', 
                url:'/admin/product-color/'+prod_color_id+'/delete',
                success:function(res){
                    thisClick.closest('.prod-color-tr').remove();
                    console.log('Success');
                    console.log('message',res.message);
                }
            })
        })
    })
</script>
@endsection