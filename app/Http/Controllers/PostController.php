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
        return view('welcome');
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
            'title' => 'required | string | max:254', 
            'body' => 'required | string|max:254', 
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:2400',
        ]);
        

        $random = Str::random(20);
        $image=$request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $image);
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image'=>$image,
            'slug'=>$random,
        ]);

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
            'title' => 'required | string | max:254', 
            'body' => 'required | string|max:254', 
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:2400',
        ]);
        $image=$request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $image);
        $data=post::where('slug',$post)->first();
        $data->title=$request->title;
        $data->image=$image;
        $data->body=$request->body;
        $data->save();
        return redirect('/admin');
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
