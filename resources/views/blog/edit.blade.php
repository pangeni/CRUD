@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/posts/{{$post->slug}}" enctype='multipart/form-data'>
    <h1>Edit Data</h1>
    <hr/>
@csrf 
@method('PUT')
<div class="row">
  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <textarea class="form-control" placeholder="Leave a title here" id="floatingTextarea" name="title">{{$post->title}}</textarea>
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>
  <div class="col-md-6 mb-3">
 
<label for="exampleFormControlInput1" class="form-label">Sub title</label>
<textarea class="form-control" placeholder="Leave a sub-title content here" id="floatingTextarea" name="sub_title">{{ $post->sub_title }}</textarea>
@error('sub_title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">meta-title</label>
<textarea class="form-control" placeholder="Leave a meta-title  here" id="floatingTextarea" name="meta_title">{{$post->meta_title}}</textarea>
@error('meta_title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">meta-description</label>
<textarea class="form-control" placeholder="Leave a meta-description  here" id="floatingTextarea" name="meta_description">{{$post->meta_description}}</textarea>
@error('meta_description')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Content</label>
  <textarea class="form-control" placeholder="Leave a contect here" id="floatingTextarea" name="content">{{$post->content}}</textarea>
  @error('content')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
  @error('image')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
</div>
  <button type="submit" class="btn btn-secondary w-100">Update</button>
</form>
  </div>

</div>
</div>
</section>

@endsection
