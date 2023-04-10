<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                @forelse ($CartItems as $item)
                <div class="cart-item">
                    <div class="row">
                        <div class="col-md-6 my-auto">
                            <a href={{'collections/'.$item->product->category->slug.'/'.$item->product->slug}}>
                                <label class="product-name">
                                    @if ($item->product->productImages)
                                    <img src={{asset($item->product->productImages[0]->image)}} style="width: 50px; height: 50px" alt= {{$item->product->name}}>
                                    @else
                                    <img src="" style="width: 50px; height: 50px" alt= {{$item->product->name}}>
                                    @endif
                                  {{$item->product->name}}
                                  @if($item->productColor)
                                  <br>
                                  <span style='margin-left:56px'>Color:{{$item->productColor->color->name}}</span>
                                  
                                  @endif
                                </label>
                            </a>
                        </div>
                        <div class="col-md-1 my-auto">
                            <label class="price">${{$item->product->selling_price}} </label>
                        </div>
                        <div class="col-md-2 col-7 my-auto">
                            <div class="quantity">
                                <div class="input-group">
                                    <button class="btn btn1" wire:click='DecrementQuantity({{$item->id}})'><i class="fa fa-minus"></i></button>
                                    <input type="text" value={{$item->quantity}} class="input-quantity" @readonly(true)/>
                                    <button class="btn btn1" wire:click='IncrementQuantity({{$item->id}})'><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1  my-auto">
                            ${{ $item->product->selling_price * $item->quantity }}
                            {{-- Total --}}
                            @php  $TotalPrice+=$item->product->selling_price * $item->quantity    @endphp
                        </div>
                        <div class="col-md-2 col-5 my-auto">
                            <div class="remove">
                                <button id="removeCart({{$item->id}})"  wire:click='removeCart({{$item->id}})' class="btn btn-danger btn-sm" >
                                 <span wire:loading.remove   wire:target='removeCart({{$item->id}})'>   <i class="fa fa-trash"></i> Remove </span>
                                 <span wire:loading wire:target='removeCart({{$item->id}})'>   <i class="fa fa-trash"></i> Removing...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="row">
                    <div class="col ms-2 mt-3 ">
                       <h6>
                        No product To display
                       </h6>
                    </div>
                    </div>
                @endforelse
                        

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-mdauto mt-3">
                    <h5>
                        Get the best deals & offers <a href="{{url('/collections')}}">Shop Now</a>
                    </h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>
                            Total:
                            <span class="float-end">${{$TotalPrice}}</span>
                        </h4>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
