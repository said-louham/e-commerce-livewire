<?php

namespace App\Http\Controllers\admin;

use App\Models\brand;
use App\Models\color;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product_color;
use App\Models\product_image;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::paginate(6);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $Brands=brand::all();
        $colors=color::all();
        return view('admin.products.create',compact('categories','Brands','colors'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=category::find($request->input('category_id'));
        $product = $category->products()->create([
            'category_id'=>$request->input('category_id'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'brand' => $request->input('brand'),
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'original_price' => $request->input('original_price'),
            'selling_price' => $request->input('selling_price'),
            'quantity' => $request->input('quantity'),
            'trending' => $request->trending?1:0,
            'status' => $request->status?1:0,
            'meta_title' => $request->input('meta_title'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
        ]);

        if ($request->hasFile('image')) {
            $i=1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $imageName = time() . $i++.'.' . $extension;
                $imageFile->move(public_path('products'), $imageName);
                $finalImagePathName = 'products'. '/' . $imageName;
                
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
            if($request->colors){
                foreach($request->colors as $key =>$color){
                    $product->productColor()->create([
                        'product_id' => $product->id,
                         'color_id'=>$color,
                         'quantity'=>$request->colorquantity[$key] ?? 0,
                    ]);
                }
            }
        }
        
        Log::critical(auth()->user()->name.'    '.auth()->user()->name.
        '   ajouter le produit id:   '.$product->id  .'   nom:  '.$product->name
          .'   de la category:  '.$category->name);
        
        return redirect('admin/product')->with('success','Product Adeed successfully');
    }
        
  
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=category::all();
        $Brands=brand::all();
        $product=product::find($id);
        $product_colors=$product->productColor->pluck('color_id')->toArray(); 
        $colors=color::whereNotIn('id',$product_colors)->get(); // color that's not on
        return view('admin.products.edite',compact('categories','Brands','product','colors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
       $product=product::find($id);
       $product->update([
        'category_id'=>$request->input('category_id'),
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'brand' => $request->input('brand'),
        'small_description' => $request->input('small_description'),
        'description' => $request->input('description'),
        'original_price' => $request->input('original_price'),
        'selling_price' => $request->input('selling_price'),
        'quantity' => $request->input('quantity'),
        'trending' => $request->trending?1:0,
        'status' => $request->status?1:0,
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' => $request->input('meta_description'),
       ]);
       $i=1;
       if($request->has('image')){
        foreach($request->file('image') as $imageFile){
               $extension=$imageFile->getClientOriginalName();
                $imageName=time().$i++.'.'.$extension;
                $imageFile->move(public_path('products'),$imageName);
                $finalImagePathName='products'.'/'.$imageName;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }   
    }
    if($request->colors){
        foreach($request->colors as $key =>$color){
            $product->productColor()->create([
                'product_id' => $product->id,
                 'color_id'=>$color,
                 'quantity'=>$request->colorquantity[$key] ?? 0,
            ]);
        }
    }
     

    return redirect('admin/product')->with('success','Product Updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id){
        $product=product::find($product_id);
        if($product->productImages){
            foreach($product->productImages as $item){
                if(File::exists($item->image)){
                    File::delete($item->image);
                }
            }
        }
        $product->delete();

        Log::critical(auth()->user()->name.'   '.auth()->user()->name.
        '    a supprimer  le produit id:   '.$product->id  .'   nom:  '.$product->name
          .'   de la category:  '.$product->Category->name);
        return redirect()->back()->with('success','Product is deleted with all its images');
    }

    public function disroyImage($product_image_id){
        $product_Image=product_image::find($product_image_id);
        if(File::exists($product_Image->image)){
            File::delete($product_Image->image);
        }
        $product_Image->delete();
        // add log 
        return redirect()->back()->with('success','product Image Delete');
    }

    public function updateProductQty(Request $request ,$product_color_id){

        $productColorData=product_color::find($product_color_id);
        $productColorData->update([
            'quantity'=>$request->qty,
        ]);
        // add log 

        return response()->json(['message'=>'product color Qty updated']);
    }
    public function deleteProdColor($product_color_id){
        $product_Color=product_color::findOrFail($product_color_id);
        $product_Color->delete();
        // add log 
        return response()->json(['message' => 'Product Color Deleted']);
    }
}
