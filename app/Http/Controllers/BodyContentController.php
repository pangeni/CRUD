<?php

namespace App\Http\Controllers;
use App\Model\BodyContent;
use Illuminate\Http\Request;

class BodyContentController extends Controller
{
    public function index()
    {
        $bodycontent = BodyContent::all(); 

        return view('Content.index', ['body_contents' => $bodycontent]);
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
        if(isset($request->image)){
            $filename = $request->image; 
            $image = time().'_' . $random . '.' . $filename->extension(); 
            $filename->move(public_path('images'), $image); 
            $data->image = $image; 

        }
        $data->slug = $random; 
        $data->sub_title = $request->subtitle; 
        $data->page = $request->page; 
        $data->save(); 

        return redirect ('/Content');
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
    public function edit($contentbody)
    {
        return view ('Content.edit', ['banners' => $contentbody]); 
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

        $random = Str::slug($request->title, '-');

        $data=new BodyContent();
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
        $data->page = $request->page; 
        $data->save(); 

        return redirect ('/Content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($contentbody)
    {
       $contentbody-> delete(); 
       return redirect('/Content');
    }
}
