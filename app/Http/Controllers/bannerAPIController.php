<?php

namespace App\Http\Controllers;
use App\Models\banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class bannerAPIController extends Controller
{
    public function index()
    {
        $banner = Banner::all(); 

        return response($banner, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title' => 'string',
        ]);

        $banner = Banner::create($data); 
        
        return response($banner, 200);
    }

    public function update (Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required | string | max:254 | unique:posts', 
            'sub_title' => 'string',
        ]);

        $banner = Banner::where('id', $id)->update($data, $id); 
        
        return response($banner, 200);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete(); 

        return response('bank deleted', 200);
    }
}
