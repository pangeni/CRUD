<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery; 

class GalleryController extends Controller
{
    public function index()
    {
      $gallery = Gallery::all();

      return view ('Gallery.index', ['gallery' => $gallery]);
    }

    public function create()
    {
       return view('Gallery.create');
    }

    public function store(Request $request)
    {
      $request->Validate([
        'title' => 'required | String | max:20',
        'image' => 'required | mimes:jpeg,jpg,png,gif',
        'description' => 'required | String | max:254'
      ]);

      $gallery = new Gallery();
      $gallery->title = $request->title ; 
      $gallery->description = $request->description; 
      $gallery->slug = Str::slug($requset->title, '-'); 
      $slug = $post->slug; 
      if(isset($request->image)){
        $filename = $request->image; 
        $image = time().'_' . $random . '.' . $filename->extension(); 
        $filename->move(public_path('images'), $image); 
        $data->image = $image; }  

      $gallery->save();

      return redirect(route('gallery.index'))->with('message', 'Images added sucessfully');

    }
}
