<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery; 
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index()
    {
      $gallery = Gallery::all();

      return view ('Gallery.index', compact ('gallery'));
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
      if($request->hasFile('image'))
      {
        $filename = $request->image; 
        $newName = time() . '-'. $slug . '.' . $filename->getClientOriginalExtension(); 
        $image_resize = Image::make($filename->getRealPath());
        $image_resize->resize(  1200, 1200, 
        function($constraint){
          $constraint->aspectRatio(); 
          $constraint->upsize();
        });
        $image_resize->save(public_path('images/' .$newName));
        $gallery->image = $newName;

      }
      $gallery->save();

      return redirect(route('gallery.index'))->with('message', 'Images added sucessfully');

    }
    public function edit ($id)
    {
      $gallery = gallery::find($id);
      return view('Gallery.edit',compact('gallery'));
    }
    public function update(request $gallery)
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
      if($request->hasFile('image'))
      {
        $filename = $request->image; 
        $newName = time() . '-'. $slug . '.' . $filename->getClientOriginalExtension(); 
        $image_resize = Image::make($filename->getRealPath());
        $image_resize->resize(  1200, 1200, 
        function($constraint){
          $constraint->aspectRatio(); 
          $constraint->upsize();
        });
        $image_resize->save(public_path('images/' .$newName));
        $gallery->image = $newName;
      }
      $gallery->update();

      return redirect(route('gallery.index'))->with('message', 'Images added sucessfully');

    }
    public function destroy ($gallery)
    {
      $gallery= Gallery::where('slug',$gallery)->first();
      $gallery->delete(); 
      return redirect()->back()->with('message', 'images Removed');  
  }
}