<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\slider;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller {
    public function index()
    {
        $sliders=slider::where('status',0)->get();
        
        Log::critical('home viste');
        return view('frontend.index',compact('sliders'));
    }
    public function categories()
    {
        $categories=category::where('status',0)->get();
        return view('frontend.category.index',compact('categories'));
    }


    public function product($category_slug)
    {
       $category=category::where('slug',$category_slug)->first();
       if($category->id){
           $products=$category->products()->get();
            return view('frontend.product.index',compact('category','products'));
       }else{
        return redirect()->back();
       }
    }

public function ShowProduct($category_slug,$product_slug){
    $category=category::where('slug',$category_slug)->where('status',0)->first();
    // $product=product::where('slug',$product_slug)->first();
    // $product=$category->products()->where('slug',$product_slug)->where('status',0)->first();
    $product=product::where('category_id',$category->id)
                            ->where('slug',$product_slug)
                            ->first();
    if($category){
        
        if($product){
            // dd($product);
            return view('FrontEnd.product.showProduct',compact('category','product'));
        }else{
            return redirect()->back();
            // return 'product not found        '.$category->slug;
        }
    }else{
             return redirect()->back();
            // return 'category not found';

    }
}

public function thankYou(){
    return view('frontend.thank-you');
}

}
