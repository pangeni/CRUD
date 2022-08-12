<?php

namespace App\Http\Controllers;
use App\Models\BodyContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BodyContentController extends Controller
{
    public function index()
    {
        $bodycontent = BodyContent::all(); 

        return view('content.index', ['body_contents' => $bodycontent]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Content.create');
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
            'page' => 'string',
            'content' => 'required | string | max:254',
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);

        $random = Str::slug($request->title, '-');

        $data=new BodyContent();
        $data->title=$request->title;
        $data->content = $request->content; 
        $data->sub_title = $request->sub_title; 
        $data->page = $request->page; 
        $data->slug = Str::slug($request->title, '-'); 
        $slug = $data->slug; 
        if($request->hasFile('image'))
        {
          $filename = $request->image; 
          $newName = time() . '-'. $slug . '.' .  $filename->getClientOriginalExtension(); 
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

        return redirect(route('content.index'))->with('message', 'Body Content added sucessfully');
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
    public function edit($bodycontent)
    {
        $contentbody = BodyContent::where('slug', $bodycontent)->first();
        return view ('Content.edit', ['bodycontent' => $contentbody]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$contentbody)
    {
        $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title' => 'string',
            'page' => 'string',
            'content' => 'required | string | max:254',
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);

        $data = BodyContent::where('slug', $contentbody)->first();
        $data->title=$request->title;
        $data->content = $request->content; 
        $data->slug = Str::slug($request->title, '-'); 
        $slug = $request->slug; 
        if($request->hasFile('image'))
        {
          $filename = $request->image; 
          $newName = time() . '-'. $slug . '.' .  $filename->getClientOriginalExtension(); 
          $image_resize = Image::make($filename->getRealPath());
          $image_resize->resize(  1200, 1200, 
          function($constraint){
            $constraint->aspectRatio(); 
            $constraint->upsize();
          });
        }
        $data->sub_title = $request->sub_title; 
        $data->page = $request->page; 
        
        $data->update(); 

        return redirect(route('content.index'))->with('message', 'Content edited sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy ($bodycontent)
    {
        $bodycontent= BodyContent::where('slug',$bodycontent)->first();
        $bodycontent->delete(); 
        return redirect()->back()->with('message', 'Content Removed');  
    }
}
