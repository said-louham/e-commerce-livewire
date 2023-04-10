<?php

namespace App\Http\Controllers\admin;

use App\Models\color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=color::all();
        return view('admin.colors.index',compact('colors'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request){
        $validatedData=$request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        color::create($validatedData);
        return redirect('admin/color')->with('success','Color Added seccessfully');
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
    public function edit(color $color)
    {
        return view('admin.colors.edite',compact('color'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request,color $color)
    {
        $validatedData=$request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        $color->update($validatedData);
        return redirect('admin/color')->with('success','Color Updated seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        $color->delete();
        return redirect('admin/color')->with('success','Color Delted Seccessfully seccessfully');
    }
}
