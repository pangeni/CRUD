@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/posts" enctype='multipart/form-data'>
    <h1>Insert Form</h1>
    <hr/>
@csrf 
<div class="row">
  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <textarea class="form-control" placeholder="Leave a title here" id="floatingTextarea" name="title"></textarea>
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>
  <div class="col-md-6 mb-3">
 
<label for="exampleFormControlInput1" class="form-label">sub-title</label>
<textarea class="form-control" placeholder="Leave a sub-title here" id="floatingTextarea" name="sub_title"></textarea>
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">meta-title</label>
<textarea class="form-control" placeholder="Leave a meta-title  here" id="floatingTextarea" name="meta_title"></textarea>
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">meta-description</label>
<textarea class="form-control" placeholder="Leave a meta-description  here" id="floatingTextarea" name="meta_description"></textarea>
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Content</label>
  <textarea class="form-control" placeholder="Leave a contect here" id="floatingTextarea" name="content"></textarea>
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
  <button type="submit" class="btn btn-secondary w-100">Create</button>
</form>
  </div>

</div>
</div>
</section>

@endsection
