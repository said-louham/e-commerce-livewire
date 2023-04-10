<?php

namespace App\Http\Livewire\FrontEnd\Wishlist;

use App\Models\wishlist;
use Livewire\Component;

class WishlistCounter extends Component
{

public $wishlistCounter;
protected $listeners=['wishlistChanged'=>'GetwishlistCounter'];
public function GetwishlistCounter(){
    if(auth()->check()){
            return wishlist::where('user_id',auth()->user()->id)->count();
    }else {
       return  $this->wishlistCounter=0;
    }
}

    public function render()
    {
        $this->wishlistCounter=$this->GetwishlistCounter();
        return view('livewire.front-end.wishlist.wishlist-counter',[
            'wishlistCounter'=>$this->wishlistCounter
        ]);
    }
}
