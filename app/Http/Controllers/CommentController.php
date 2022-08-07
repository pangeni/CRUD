<?php

namespace App\Http\Controllers;
use App\Models\comment; 
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all(); 

        return view ('Comment.index', ['comments' => $comment]);
    }

    public function create()
    {
        return view ('Comment.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'name' => 'required | String | max:20', 
            'company' => 'required | string', 
            'message' => 'required | String | max:254',
            'image'  => 'required|mimes:jpeg,jpg,png,gif',
        ]); 

        $comment = new Comment(); 

        $comment->name = $request->name; 
        $comment->company = $request->company; 
        $comment->message = $request->message; 
        if(isset($request->image)){
            $filename = $request->image; 
            $image = time(). '.' . $filename->extension(); 
            $filename->move(public_path('images'), $image); 
            $comment->image = $image; 

        }
        $comment-> save();

        return redirect(route('comment.index'))->with('message', 'Customer Review Success');
    }

    public function destroy($comment)
    {
        $comment= comment::find($comment);
        $comment-> delete(); 
        return redirect()->back()->with('message', 'comment has been removed');

    }
}
