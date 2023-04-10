<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (){
        return view('admin.category.index');
    }

    public function create (){
        return view('admin.category.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request){
        $valideData=$request->validated();
        if($request->has('image')){
            $file=$request->image;
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('Category'),$imageName);
            $filaPath='Category/'.$imageName;
        }
   $category= category::create([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image' =>$filaPath, 
        'meta_title' => $request->input('meta_title'),
        'meta_keyword' => $request->input('meta_keyword'),
        'meta_description' =>$request->input('meta_description'), 
        'status' =>$request->input('status')  ?  1 : 0, 
    ]);
return redirect('admin/category')->with('success','Category added seccessfully');
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
    public function edit(category $category)
    {
        return view('admin.category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        if($request->has('image')){
            $file=$request->image;
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('Category'),$imageName);#upload the file into mypicture folder
            if (file_exists(public_path('Category/').$category->image)){
                unlink(public_path('Category/').$category->image);
            }  
            $category->image='Category/'.$imageName;
        }
        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'image' =>$category->image, 
            'meta_title' => $request->input('meta_title'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' =>$request->input('meta_description'), 
            'status' =>$request->input('status')  ?  1 : 0, 
        ]);
        return redirect('admin/category')->with('success','Category updated  seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
