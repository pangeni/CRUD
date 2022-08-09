<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;

class bannerAPI extends Controller
{
    public function index()
    {
        $banner = Banner::all(); 

        return response($banner, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return response('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title' => 'string',
        ]);

        $data=new Banner();
        $data->title=$request->title;
        $data->sub_title = $request->sub_title; 
        if($request->hasFile('image'))
        {
          $filename = $request->image; 
          $newName = time() . '-' . $filename->getClientOriginalExtension(); 
          $image_resize = Image::make($filename->getRealPath());
          $image_resize->resize(  1200, 1200, 
          function($constraint){
            $constraint->aspectRatio(); 
            $constraint->upsize();
          });
          $image_resize->save(public_path('images/' .$newName));
          $data->image = $newName;
        } 
        $data->save(); 

        return response ($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $id)
    {
        return view('banner/edit', ['banners' => Banner::find($id)]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$banner)
    {
        $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title'=>'string', 
            
        ]);

        $banner=new Banner();
        $banner->title=$request->title;
        $banner->sub_title = $request->sub_title; 
        if($request->hasFile('image'))
        {
          $filename = $request->image; 
          $newName = time() . '-'. $filename->getClientOriginalExtension(); 
          $image_resize = Image::make($filename->getRealPath());
          $image_resize->resize(  1200, 1200, 
          function($constraint){
            $constraint->aspectRatio(); 
            $constraint->upsize();
          });
          $image_resize->save(public_path('images/' .$newName));
          $banner->image = $newName;
        } 
        $banner->save(); 
        return response ($banner, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Banner::destroy($id);
    }

    public function search($title)
    {
        return Banner::where('title', 'like', '%'. $title. '%')->get();
    }
}
