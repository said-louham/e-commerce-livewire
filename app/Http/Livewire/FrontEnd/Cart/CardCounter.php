<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use App\Models\Cart;
use Livewire\Component;

class CardCounter extends Component
{

public $CartCounter=0;
protected $listeners=['CartChanged'=>"GetCartCounter"];
    public function GetCartCounter(){
        if(auth()->check()){
           return Cart::where('user_id',auth()->user()->id)->count();
        }else{
            return 0;
        }
    }
    public function render()
    {
        $this->CartCounter=$this->GetCartCounter();
        return view('livewire.front-end.cart.card-counter',[
            'CartCounter'=>$this->CartCounter
        ]);
    }
}
