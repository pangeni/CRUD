@extends('layout/layout')
@section('content')
<div class="container">
  <div class="inertform py-5">
  <form method="POST" class="border p-4 w-50 mx-auto" action="/posts" enctype='multipart/form-data'>
    <h1>Insert Form</h1>
    <hr/>
@csrf 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter title" name="title">
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Body</label>
  <input type="text"  name="body" class="form-control" id="exampleFormControlInput1" placeholder="enter Body">
  @error('body')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
  @error('image')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
  <button type="submit" class="btn btn-secondary w-100">Create</button>
</form>
  </div>

</div>


@endsection
