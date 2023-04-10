<?php

namespace App\Http\Livewire\FrontEnd\Wishlist;

use App\Models\wishlist;
use Livewire\Component;

class Index extends Component
{

    public function RemoveWishlist($wishlist_id){
     $wishlist=wishlist::find($wishlist_id);
     $wishlist->delete(); 
     $this->emit('wishlistChanged');
     $this->dispatchBrowserEvent('notification',[
        "text"=>$wishlist->product->name."  deleted seccessfuly",
        "type"=>"success",
        "status"=>200,
     ]);
    }


    public function render(){
    if(auth()->check()){
        $wishlist=wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.front-end.wishlist.index',compact('wishlist'));
    }
    }
}
