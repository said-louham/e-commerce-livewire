<?php

namespace App\Http\Livewire\FrontEnd\Products;

use App\Models\Cart;
use App\Models\color;
use App\Models\product;
use Livewire\Component;
use App\Models\category;
use App\Models\wishlist;

class Show extends Component
{
    public $category;
    public $product;
    public $Selected_Product_Qte;
    public $quantity=1;
    public $product_color_id;

 //------------------------------------------------------------------------------------------------
    public function mount($category, $product){
         $this->category=$category;
         $this->product=$product;

    }
 //------------------------------------------------------------------------------------------------
    public function SelectColor($product_color_id){
      $this->product_color_id=$product_color_id;
       $productColor= $this->product->productColor()->where('id',$product_color_id)->first();
      // productColor={"id" => 26,"product_id" => 32, "color_id" => 4, "quantity" => 2}
     $this->Selected_Product_Qte=$productColor->quantity;
     if($this->Selected_Product_Qte<=0){
        $this->Selected_Product_Qte= 'OutOfStock';
     }
    }
 //------------------------------------------------------------------------------------------------
    public function addToWishlist($product_id){
        if (auth()->check()){
                 $wishlist=wishlist::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists();
                if($wishlist){
                         $this->dispatchBrowserEvent('notification',[
                            "text"=>"already exist on wishlist",
                            "type"=>"success",
                            "status"=>409,
                         ]);
                         return false ;
                }else{
                        wishlist::create([
                            'product_id' =>$product_id,
                            'user_id'=>auth()->user()->id
                        ]);
                        $this->emit("wishlistChanged");
                        $this->dispatchBrowserEvent('notification',[
                           "text"=>"wishlist added seccessfuly",
                           "type"=>"success",
                           "status"=>200,
                        ]);
                }
        }else {
            $this->dispatchBrowserEvent('notification',[
               "text"=>"please login to continue",
               "type"=>"warning",
               "status"=>401,
            ]);
            return false ;
        }
    }
 //------------------------------------------------------------------------------------------------
    public function IncrementQunatity(){
      if($this->quantity < 10){
         $this->quantity++;
      }
      if($this->quantity==10){
         $this->dispatchBrowserEvent('notification',[
            "text"=>"Max quantity is 10",
            "type"=>"success",
            "status"=>200,
         ]);
      }
   }
   public function DecrementQunatity(){
      if($this->quantity > 1){
         $this->quantity--;
      }
   }
 //------------------------------------------------------------------------------------------------
 
public function AddToCart($product_id){
   if (auth()->check()) {
         if($this->product->where('id',$product_id)->where('status',0)->exists())
         {
            if($this->product->productColor()->count() >= 1){

                 // dd('im product color inside');
                  if($this->Selected_Product_Qte!=null){
                     // dd('color selected');
               if(
               Cart::where('user_id',auth()->user()->id)
               ->where('product_id',$product_id)
               ->where('product_color_id',$this->product_color_id)
               ->exists()  ){
                        $this->dispatchBrowserEvent('notification',[
                           "text"=>"Product Already Added to Cart", 
                           "type"=>"warning",
                           "status"=>200,
                        ]);
               }else{ # move it here 

                  $productColor= $this->product->productColor()->where('id',$this->product_color_id)->first();
                  if($productColor->quantity > 0){
   
                        if ($productColor->quantity >= $this->quantity) {  
                           // insert to cart
                           Cart::create([
                              'user_id'=>auth()->user()->id,
                              'product_id'=>$product_id,
                              'product_color_id'=>$this->product_color_id,
                              'quantity'=>$this->quantity
                           ]) ;
                              $this->emit('CartChanged');
                              $this->dispatchBrowserEvent('notification',[
                              "text"=>"Product Added to Cart", 
                              "type"=>"success",
                              "status"=>200,
                           ]);

                        } else {
                        
                           // dd("Only ".$productColor->quantity.'Quantity avilable');
                           $this->dispatchBrowserEvent('notification',[
                              "text"=>"Only ".$this->product->quantity.'  Quantity avilable',
                              "type"=>"info",
                              "status"=>401,
                           ]);
                        }

                  }else{
                     $this->dispatchBrowserEvent('notification',[
                        "text"=>"Out of Stock !",
                        "type"=>"warning",
                        "status"=>404,
                     ]);
                  }
               }   # move this to top

                  }else{
                              // session()->flash('success', 'Select Your Product Color');
                        $this->dispatchBrowserEvent('notification',[
                           "text"=>"Select Your Product Color",
                           "type"=>"warning",
                           "status"=>404,
                        ]);
                  }

            }else{
               
               if(Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists()){
                  $this->dispatchBrowserEvent('notification',[
                     "text"=>"Product Already Added to Cart", 
                     "type"=>"warning",
                     "status"=>200,
                  ]);
               }else{

               
                           if ($this->product->quantity > 0) {
                              
                              if ($this->product->quantity > $this->quantity) {
                                 // insert product to cart
                                 // dd('product without colors inside');
                                 Cart::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=>$product_id,
                                    'quantity'=>$this->quantity
                                 ]) ; 
                                 
                                    $this->emit('CartChanged');
                                    $this->dispatchBrowserEvent('notification',[
                                    "text"=>"Product Added to Cart", 
                                    "type"=>"success",
                                    "status"=>200,
                                 ]);



                           } else {
                              $this->dispatchBrowserEvent('notification',[
                                 "text"=>"Only ".$this->product->quantity.'Quantity avilable',
                                 "type"=>"info",
                                 "status"=>401,
                              ]);
                           }
                           


                        } else {
                           $this->dispatchBrowserEvent('notification',[
                              "text"=>"Out of Stock !",
                              "type"=>"warning",
                              "status"=>404,
                           ]);
                        }
            
                 }
      }
   }
         else
         {
            $this->dispatchBrowserEvent('notification',[
               "text"=>"Product does not exists",
               "type"=>"warning",
               "status"=>404,
            ]);
         }
   } else {
      $this->dispatchBrowserEvent('notification',[
         "text"=>"please login to add to cart",
         "type"=>"info",
         "status"=>401,
      ]);
   }
   

}
 
 public function render()
    {
        return view('livewire.front-end.products.show',['category'=>$this->category,'product'=>$this->product]);
    }

}

