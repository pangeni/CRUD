<?php

namespace App\Http\Controllers;
use App\Models\services; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    public function index()
    {
      $service = services::all();

      return view ('service.index', compact ('service'));
    }

    public function create()
    {
       return view('service.create');
    }

    public function store(Request $request)
    {
     
      $request->validate([
        'title' => 'required | String | max:20',
        'image' => 'required | mimes:jpeg,jpg,png,gif',
        'description' => 'required | String | max:254',
      ]);

      $service = new services();
      $service->title = $request->title ; 
      $service->description = $request->description; 
      $service->slug = Str::slug($request->title, '-'); 
      $slug = $service->slug; 
      $service->status = $request->status; 
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
        $service->image = $newName;

      }
      $service->save();

      return redirect(route('service.index'))->with('message', 'Images added sucessfully');

    }
    public function edit ($id)
    {
      $service = services::find($id);
      return view('service.edit',compact('service'));
    }
    public function update(request $request, $service)
    {
      $request->validate([
        'title' => 'required | String | max:20',
        'image' => 'required | mimes:jpeg,jpg,png,gif',
        'description' => 'required | String | max:254',
      ]);

      $service = new services();
      $service->title = $request->title ; 
      $service->description = $request->description; 
      $service->slug = Str::slug($request->title, '-'); 
      $slug = $service->slug; 
      $service->status = $request->status; 
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
        $service->image = $newName;
      }
      $service->update();

      return redirect(route('service.index'))->with('message', 'Images added sucessfully');

    }
    public function destroy ($service)
    {
      $service= services::where('slug',$service)->first();
      $service->delete(); 
      return redirect()->back()->with('message', 'images Removed');  
  }
}
