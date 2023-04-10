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
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                     
                        @forelse ($wishlist as $item)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href={{url("collections/".$item->product->category->slug."/".$item->product->name)}}>
                                        <label class="product-name">
                                            <img src={{ asset($item->product->productImages[0]->image) }} style="width: 50px; height: 50px" alt="">
                                         
                                                    {{$item->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$item->product->selling_price}} </label>
                                </div>
                                <div class="col-md-2 col-8 my-auto">
                                    <div class="remove">
                                        <button id="RemoveWishlist({{$item->id}})"  wire:click='RemoveWishlist({{$item->id}})' class="btn btn-danger btn-sm">
                                         <span  wire:loading.remove   wire:target='RemoveWishlist({{$item->id}})'>   <i class="fa fa-trash" ></i> Remove </span>
                                         <span wire:loading   wire:target='RemoveWishlist({{$item->id}})'>   <i class="fa fa-trash"></i> Removing ... </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="row">
                                <div class="col-md-6  mt-3 d-flex justify-content-center">No Product In Wishlist</div>
                            </div>
                        @endforelse
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
