@extends('layout/layout')
@section('content')
<div class="container">
  <div class="inertform py-5">
  <form method="POST" class="border p-4 w-50 mx-auto" action="/posts/{{$post->slug}}" enctype='multipart/form-data'>
    <h1>Edit Data</h1>
    <hr/>
@csrf 
@method('PUT')
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter title" name="title" value="{{$post->title}}">
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Body</label>
  <input type="text"  name="body" class="form-control" id="exampleFormControlInput1" placeholder="enter Body" value="{{$post->body}}">
  @error('body')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control" name="image" id="exampleFormControlInput1" value="{{$post->image}}">
  @error('image')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
  <button type="submit" class="btn btn-secondary w-100">Create</button>
</form>
  </div>

</div>


@endsection
