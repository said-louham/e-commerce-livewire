<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\brand;
use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    
    public $name;
    public $slug;
    public $status;
    public $brand_id;
    public $category_id;




    public function rules()
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'status'=>'nullable',
            'category_id'=>'required',
        ];
    }

    public function storeBrand(){
        // // how to add brand request 
        $data=$this->validate();
            brand::create([
                'name'=>$this->name,
                'slug'=>$this->slug,
                'status'=>$this->status?1:0,
                'category_id'=>$this->category_id
            ]);
            session()->flash('success','brand added successfully');
            $this->dispatchBrowserEvent('close-modal-brand');
           $this-> ResetInputs();

    }


    public function ResetInputs()
    {
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->category_id=null;
    }
    //  ------------------edite ----------------------
    public function editeBrand($brand_id)
    {
        $this->dispatchBrowserEvent('show-modal');

        $this->brand_id=$brand_id;
        $brand= brand::findOrFail($brand_id);

       $this->name=$brand->name;
       $this->slug=$brand->slug;
       $this->status=$brand->status;
       $this->category_id=$brand->category->id;

    }
    // --------------------Update-------------------------
    public function UpdateBrand()
    {
        $brand= brand::findOrFail($this->brand_id);
        $brand->update([
            'name'=>$this->name,
            'slug'=>$this->slug,
            'status'=>$this->status?1:0,
            'category_id'=>$this->category_id
        ]);
        session()->flash('success','brand updated successfully');
        $this->dispatchBrowserEvent('close-modal-update');
       $this-> ResetInputs();
    }

    public function deleteBrand($brand_id){
        
        $this->dispatchBrowserEvent('show-modal-delete-brand');
            $this->brand_id=$brand_id;
    }

    public function destroyBrand(){

        $Brand=brand::find($this->brand_id);
        
        $Brand->delete();
        session()->flash('success','Brand deleted seccessfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render() {
        $categories=category::where('status',0)->get();
      $brands =  brand::orderby('id','DESC')->paginate(4);
        return view('livewire.admin.brand.index',['brands'=>$brands,'categories'=>$categories])
                     ->extends('layouts.admin') 
                     ->section('content')  ;
    }
}
