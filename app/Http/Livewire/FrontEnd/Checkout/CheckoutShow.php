<?php

namespace App\Http\Livewire\FrontEnd\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{

public $TotalPrice=0,$TotalProductsAmount,$cart;
public $fullname,$email,$phone,$pincode,$address,$payment_mode=null,$payment_id=null;
protected $listeners=[
    "validationData",
    "transctionEmit"=>"paidOnlineOrder"
];
//------------------------------------------------------------------
public function TotalProductAmount(){
            $this->TotalPrice=0; 
            $cart= Cart::where('user_id',auth()->user()->id)->get();
            $this->cart=$cart;

            foreach($cart as $item){
                $this->TotalPrice+= $item->quantity*$item->product->selling_price;
            }
    return $this->TotalPrice;
}

public function rules(){
    return[
        'fullname'=>'required|string|max:121',
        'email'=>'required|string|max:121',
        'phone'=>'required|string|min:10|max:11',
        'pincode'=>'required|string',
        'address'=>'required|string|max:500'
    ];
}
public function passOrder(){
    $this->validate();

    $order=Order::create([
        'user_id'=>auth()->user()->id,
        'tracking_no'=>"said-".Str::random(10),
        'fullname'=>$this->fullname,
        'email'=>$this->email,
        'phone'=>$this->phone,
        'pincode'=>$this->pincode,
        'address'=>$this->address,
        'status_message'=>'in progress',
        'payment_mode'=>$this->payment_mode,
        'payment_id'=>$this->payment_id,
    ]);
    
    foreach($this->cart as $cartItem){
                    $orderItem=OrderItem::create([
                        'order_id'=>$order->id,
                        'product_id'=>$cartItem->product_id,
                        'product_color_id'=>$cartItem->product_color_id,
                        'quantity'=>$cartItem->quantity,
                        'price'=>$cartItem->product->selling_price,
                    ]);

                // decrement product quantiy 
                if($cartItem->product_color_id!=null)
                {
                    $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                }else{
                    $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
                }
    }


   return $order;

}

//---------------------------------------------------------------
public function makeOrder(){
    $this->payment_mode="COD";
   $order= $this->passOrder();
   if($order){
    Cart::where('user_id',auth()->user()->id)->delete();
    $this->dispatchBrowserEvent('notification',[
        "text"=>"Order placed seccessfully", 
        "type"=>"success",
        "status"=>200,
     ]);
     return redirect('thank-you');
}else {
    $this->dispatchBrowserEvent('notification',[
        "text"=>"somthing went wrong", 
        "type"=>"success",
        "status"=>500,
     ]);

}

}
//---------------------------------------------------------------
public function validationData(){
$this->validate();
}
//--------------------------------------------------------------- 
public function paidOnlineOrder($transaction_Vlaue){
    $this->payment_id=$transaction_Vlaue;
    $this->payment_mode='Paypal';
    $order= $this->passOrder();
    if($order){
     Cart::where('user_id',auth()->user()->id)->delete();
     $this->dispatchBrowserEvent('notification',[
         "text"=>"Order placed seccessfully", 
         "type"=>"success",
         "status"=>200,
      ]);
      return redirect('thank-you');
 }else {
     $this->dispatchBrowserEvent('notification',[
         "text"=>"somthing went wrong", 
         "type"=>"success",
         "status"=>500,
      ]);
 
 }
}
//---------------------------------------------------------------
    public function render()
    {
        $this->fullname=auth()->user()->name;
        $this->email=auth()->user()->email;
        $this->TotalProductsAmount=$this->TotalProductAmount();
        return view('livewire.front-end.checkout.checkout-show',[
            'TotalProductsAmount'=>$this->TotalProductsAmount
        ]);
    }
}
