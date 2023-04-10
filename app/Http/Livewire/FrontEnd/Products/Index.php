<?php

namespace App\Http\Livewire\FrontEnd\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $category, $products, $brandInputs = [],$priceInput;



    public function mount($category){
         $this->category = $category;
    }

    public function render() {
         
        $this->products = Product::where('category_id', $this->category->id)
        // filter product by brands
        ->when($this->brandInputs, function ($query) {      // befor function if no selection show all products
                      $query->whereIn('brand', $this->brandInputs);          
        })
        // filter prodacts by price
        ->when($this->priceInput, function ($query) {  

                        $query->when($this->priceInput=='high-to-low',function($query2){
                            $query2->orderBy('selling_price','DESC');
                        })
                        ->when($this->priceInput=='low-to-high',function($query2){
                            $query2->orderBy('selling_price','ASC');
                        });
        })
            ->where('status', 0)
            ->get();

        return view('livewire.front-end.products.index', [
            'category' => $this->category,
            'AllProducts' => $this->products,
        ]);
    }
}
