<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all(); 

        return view('banner.index', ['banners' => $banner]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            'image'=>'required|mimes:jpeg,jpg,png,gif',
        ]);

        $data=new Banner();
        $data->title=$request->title;
        $data->sub_title = $request->sub_title; 
        $image=$request->image->getClientOriginalName();
        $request->image->move(public_path('image'), $image);
        $data->save(); 

        return redirect ('/banner');
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
    public function edit($banner)
    {
        return view ('banner.edit', ['banners' => $banner]); 
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
            'image'=>'mimes:jpeg,jpg,png,gif|max:2400',
            
        ]);

        $data=new Banner();
        $data->title=$request->title;
        $data->sub_title = $request->sub_title; 
        $image=$request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $image);
        $data->save(); 
        return redirect ('/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($banner)
    {
       $banner-> delete(); 
       return redirect('/admin');
    }
}
