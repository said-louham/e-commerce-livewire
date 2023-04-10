<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    
    public $category_id;
    
    
    public function deleteCategory($category_id){
        
        $this->dispatchBrowserEvent('show-modal');
            $this->category_id=$category_id;
    }

    public function destroyCategory(){

            $category=category::find($this->category_id);
            $path='Category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $category->delete();
            session()->flash('success','Category deleted seccessfully');
            $this->dispatchBrowserEvent('close-modal');

    }
   
    public function render()
    {
       $categories= category::latest()->paginate(3);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }

}
