<div >
    @if (session()->has('success'))
            <div class="alert alert-success">
                   {{  session()->get('success')}}
            </div>
    @endif
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src={{asset($product->productImages[0]->image)}} class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            @if ($Selected_Product_Qte=='OutOfStock')
                            <label class="label-stock bg-danger">{{__('words.Out of Stock')}}</label>  
                            @elseif($Selected_Product_Qte>0)
                            <label class="label-stock bg-success">{{__('words.In Stock')}}</label> 
                            @endif
                            
                            {{-- @if ( $product->quantity>0)
                            <label class="label-stock bg-success">In Stock</label> 
                            @else 
                            <label class="label-stock bg-danger">Out of Stock</label>  
                                
                            @endif --}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home /  {{$product->category->name}} / {{$product->name}}

                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>
                        <div class="mt-3">
                            @if ($product->productColor)
                                @foreach ($product->productColor as $item)
                                    <label  wire:click='SelectColor({{$item->id}})'class="colorSelctionLabel {{$item->color->name=='black' ?'text-white':''}}" style="background:{{$item->color->name}}" >
                                        {{$item->color->name}}
                                    </label>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            
                             {{__('words.Quantity')}}: {{$Selected_Product_Qte =='OutOfStock'?0:$Selected_Product_Qte}}
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <button class="btn btn1" wire:click='DecrementQunatity'><i class="fa fa-minus"></i></button>
                                <input type="text" wire:model='quantity'readonly  class="input-quantity" />
                                <button class="btn btn1" wire:click='IncrementQunatity'><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="mt-2">

                            <button class="btn btn1" wire:click='AddToCart({{$product->id}})'>
                                 <i class="fa fa-shopping-cart"></i>{{__('words.Add To Cart')}}
                            </button>



                            <button href="" class="btn btn1" wire:click='addToWishlist({{$product->id}})'> <i class="fa fa-heart"></i> 
                                 {{__('words.Add To Wishlist')}}
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">{{__('words.Small Descriptnion')}}</h5>
                            <p>
                                {{$product->small_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>{{__('words.Description')}}</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
