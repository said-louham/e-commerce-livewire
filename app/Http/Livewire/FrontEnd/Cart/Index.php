<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use App\Models\Cart;
use Livewire\Component;

class Index extends Component
{


public $TotalPrice=0;
public function IncrementQuantity($cartID){
        $cartItem=Cart::where('id',$cartID)->where('user_id',auth()->user()->id)->first();
      
        if($cartItem){

                    if($cartItem->productColor()->where('id',$cartItem->product_color_id)->exists()){
                               $productColor=$cartItem->productColor()->where('id',$cartItem->product_color_id)->first();

                                if($productColor->quantity > $cartItem->quantity){
                                    $cartItem->increment('quantity');
                                    $this->dispatchBrowserEvent('notification',[
                                        "text"=>"Quantity Updated seccessfully",
                                        "type"=>"success",
                                        "status"=>200,
                                    ]);
                                }else{
                                    $this->dispatchBrowserEvent('notification',[
                                        "text"=>"Only ".$productColor->quantity."  Quantity avaliable",
                                        "type"=>"warning",
                                        "status"=>500,
                                    ]);
                                }
                    
                                 // dd('product with color'.$productColor->quantity);

                    }else {
                        
                                if($cartItem->product->quantity > $cartItem->quantity ){
                                            $cartItem->increment('quantity');
                                            $this->dispatchBrowserEvent('notification',[
                                                "text"=>"Quantity Updated seccessfully",
                                                "type"=>"success",
                                                "status"=>200,
                                            ]);
                                }else{
                                            $this->dispatchBrowserEvent('notification',[
                                                "text"=>"Only ".$cartItem->product->quantity."  Quantity avaliable",
                                                "type"=>"warning",
                                                "status"=>500,
                                            ]);
                                }
                    }
        }else{
            $this->dispatchBrowserEvent('notification',[
                "text"=>'Somthing went Wrong',
                "type"=>"error",
                "status"=>500,
             ]);
        }
    }
//-----------------------------------------------------------------------------------------
public function DecrementQuantity($cartID){
    $cartItem=Cart::where('id',$cartID)->where('user_id',auth()->user()->id)->first();
    if($cartItem){
            if($cartItem->quantity > 1){
                $cartItem->decrement('quantity');
                $this->dispatchBrowserEvent('notification',[
                    "text"=>"Quantity Updated seccessfully",
                    "type"=>"success",
                    "status"=>200,
                 ]);
                }
                
    }else{
        $this->dispatchBrowserEvent('notification',[
            "text"=>'Somthing went Wrong',
            "type"=>"error",
            "status"=>500,
         ]);
        }
        
    }
    


//----------------------------------------------  
public function removeCart($cartID){
        // dd($cartID);
    $cart=Cart::where('id',$cartID)->where('user_id',auth()->user()->id)->first();
    if($cart){
                $cart->delete();
                $this->emit('CartChanged');
                
                $this->dispatchBrowserEvent('notification',[
                    "text"=>"  Product deleted seccessfully ",
                    "type"=>"success",
                    "status"=>200,
                ]);
    }else{
        $this->dispatchBrowserEvent('notification',[
            "text"=>"Sonthing went wrong",
            "type"=>"error",
            "status"=>402,
        ]);
    }
}

    public function render() {
        $CartItems=Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.front-end.cart.index',[
            "CartItems"=>$CartItems
        ]);
    }

    
    
}
