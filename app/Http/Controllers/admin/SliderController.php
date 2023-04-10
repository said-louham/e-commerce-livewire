<?php

namespace App\Http\Controllers\admin;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $validatedData=$request->validated();
        
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() .'.' . $extension;
            $file->move(public_path('Sliders'), $imageName);
            $validatedData['image'] = 'Sliders/'. $imageName;
        }


        $validatedData['status'] = $request->status ==true? 1:0;
        slider::create([
            'title'=>  $validatedData['title'],
            'description'=>  $validatedData['description'],
            'image'=>  $validatedData['image'],
            'status'=>  $validatedData['status'],
        ]);
        return redirect('admin/slider')->with('success','Slider added successfuly');

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
    public function edit(slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, slider $slider)
    {
        
        $validatedData=$request->validated();
         if($request->has('image')){
            $file=$request->image;
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('Sliders'),$imageName);
     
           if (file_exists(public_path('Sliders/').$slider->image)){
                unlink(public_path('Sliders/').$slider->image);
            }       
            $slider->image='Sliders/'.$imageName;
        }
        $validatedData['status'] = $request->status ==true? 1:0;
        $slider->update([
            'title'=>  $validatedData['title'],
            'description'=>  $validatedData['description'],
            'image'=>  $slider->image,
            'status'=>  $validatedData['status'],
        ]);
        return redirect('admin/slider')->with('success','Slider updated successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        $slider->delete();
        return redirect('admin/slider')->with('success','Slider Deleted Seccessfully');
    }
}
