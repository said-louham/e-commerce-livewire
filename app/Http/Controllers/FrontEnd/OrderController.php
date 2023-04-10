<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    
        $orders=Order::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(3);
        return view('frontend.Order.index',compact('orders'));
        
    }

    


    public function show($id)
    {
        $order=Order::where("user_id",auth()->user()->id)->where('id',$id)->first();
        if($order){
            return view('frontend.Order.show',compact('order'));
        }else{
            return redirect()->back()->with('message',"No Order Found");
        }
    }


}
