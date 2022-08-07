<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryAPI extends Controller
{
    public function index()
    {
      $gallery = Gallery::all();

      return response()->JSON($gallery);
    }

    public function create()
    {
       return view('Gallery.create');
    }

    public function store(Request $request)
    {
     
      $request->validate([
        'title' => 'required | String | max:20',
        'image' => 'required | mimes:jpeg,jpg,png,gif',
        'description' => 'required | String | max:254',
      ]);

      $gallery = new Gallery();
      $gallery->title = $request->title ; 
      $gallery->description = $request->description; 
      $gallery->slug = Str::slug($request->title, '-'); 
      $slug = $gallery->slug; 
      if(isset($request->image)){
        $filename = $request->image; 
        $image = time().'_' . $slug . '.' . $filename->extension(); 
        $filename->move(public_path('images'), $image); 
        $gallery->image = $image; }  

      $gallery->save();

      return response()->JSON($gallery);
    }
    

}

