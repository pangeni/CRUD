<?php

namespace App\Http\Controllers;
use App\Models\member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    public function index()
    {
        $member = member::all(); 
        return view('Member.index', ['members'=> $member]);
    }

    public function create()
    {
        return view ('Member.create'); 
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'position' => 'required',
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $member = new member();
        $member->title = $request->title;
        $member->position = $request->position;
        $member->name = $request->name;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->status = $request->status;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->slug = Str::slug($request->name, '-');
        $slug = $member->slug;

        if($request->hasFile('image')){
            $fileName = $request->image;
            $newName = time() .'_'. $slug .'_'. $fileName->getClientOriginalName();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(600,600,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('images/' .$newName));
            $member->image = 'images/' .$newName;
        }
        $member->save();

        $request->session()->flash('message','Record was Added');
        return redirect(route('member.index'))->with('message','Record added');
    }
    public function edit($member)
    {
        $member=member::where('slug',$member)->first();
        return view ('blog.edit', ['member' => $member]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //Validation
          $data = $request->validate([
            'title' => 'required',
            'position' => 'required',
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);


        $member = member::findOrFail($id);
        $member->title = $request->title;
        $member->position = $request->type;
        $member->name = $request->name;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->status = $request->status;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->slug = Str::slug($request->name, '-');
        $slug = $member->slug;

        if($request->hasFile('image')){
            $fileName = $request->image;
            if($member->image){
                @unlink($member->image);
            }
            $newName = time() .'_'. $slug .'_'. $fileName->getClientOriginalName();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(600,600,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('member/' .$newName));
            $member->image = 'member/' .$newName;
        }
        $member->update();
       
        return redirect(route('member'))->with('message','Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('issuperadmin')){
            abort(405,"Sorry You are Not Authorized to Perform this Action");
        }

        $member = Member::findOrFail($id);
        if($member->image){
            @unlink($member->image);
        }
        $member->delete();
        return redirect()->back();  
    }
}
