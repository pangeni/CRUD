<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all(); 

        return view('blog.index', ['posts' => $posts]);
    }
    public function home(){
        $posts = post::all();
        return view ('admin.homepage' ,['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'content' => 'required | string|max:254', 
            'sub_title' => 'string',
            'meta_title' => 'string',
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);
        

        $random = Str::slug($request->title, '-');
        $data->title=$request->title;
        $data->content = $request->content; 
        if(isset($request->image)){
            $filename = $request->image; 
            $image = time().'_' . $random . '.' . $filename->extension(); 
            $filename->move(public_path('images'), $image); 
            $data->image = $image; 

        }
        $data->slug = $random; 
        $data->sub_title = $request->subtitle; 
        $data->meta_title = $request->meta_title; 
        $data->meta_descripttion = $request->meta_description; 
        $data->save(); 

        return redirect ('/admin');
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
    public function edit($post)
    {
        $post=post::where('slug',$post)->first();
        return view ('blog.edit', ['post' => $post]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post)
    {
        $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title'=>'string',
            'meta_title'=>'string',
            'meta_description'=>'string',
            'content' => 'required | string|max:254', 
            'image'=>'mimes:jpeg,jpg,png,gif|max:2400',
            
        ]);
        
        
        $random = Str::slug($request->title,'-');
       
        $data=Post::where('slug',$post)->first();
        $data->title=$request->title;
        $data->content = $request->content;
        if(isset($request->image)){
            $filename=$request->image;
            $image=time().'.'.$random.'.'.$filename->extension();
            $filename->move(public_path('images'), $image);
            $data->image=$image;
        }
        $data->slug=$random;
        $data->sub_title=$request->sub_title;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->save();
        return redirect ('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post=post::where('slug',$post)->first();
       $post-> delete(); 
       return redirect('/admin');
    }
}
