<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('words.Brands')}}</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brand)
                        
                    <label class="d-block">
                        <input type="checkbox" wire:model='brandInputs' value="{{$brand->name}}"/> {{$brand->name}}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4>{{__('words.Sorting')}}</h4>
                </div>
                <div class="card-body">

                <input type="radio" wire:model.='priceInput' value='high-to-low' name='sorting' > {{__('words.Hight to low')}} <br>
                <input type="radio" wire:model='priceInput' value='low-to-high' name='sorting'> {{__('words.low to hight')}}
            </div>
            </div>
        </div>

 <div class="col-md-9">
<div class="row">
   @forelse ($AllProducts as $product)
    <div class="col-md-4">
      <div class="product-card">
          <div class="product-card-img">
              @if($product->quantity>0)
              <label class="stock bg-success">{{__('words.In Stock')}}</label>
              @endif
              <a href={{url('collections/'.$product->category->slug.'/'.$product->slug)}}>
                @if(count($product->productImages)>=1)
                       <img src={{ asset($product->productImages[0]->image) }} alt={{$product->name }} height='150px'>
                       @else
                       Product has no image
                @endif
              </a>
          </div>
          <div class="product-card-body">
              <p class="product-brand"> {{$product->brand}}</p>
              <h5 class="product-name">
                 <a href={{url('collections/'.$product->category->slug.'/'.$product->slug)}}>
                    {{$product->name}}
                 </a>
              </h5>
              <div>
                  <span class="selling-price">${{$product->selling_price}}</span>
                  <span class="original-price">${{$product->original_price}}</span>
              </div>
              <div class="mt-2">
                  <a href="" class="btn btn1"> {{__('words.Add To Cart')}}</a>
                  <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                  <a href="" class="btn btn1">  {{__('words.View')}}</a>
              </div>
          </div>
        </div>
</div>
 
    @empty
        <div class="p-2" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
          {{__('words.No product in category')}}
                                  {{$category->name}}
        </div>
    @endforelse

</div>
</div>