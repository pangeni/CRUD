@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/Gallery/{{$gallery->slug}}"  enctype='multipart/form-data'>
    <h1>Edit Data</h1>
    <hr/>
@csrf 
@method('PUT')
<div class="row">
  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <textarea class="form-control" placeholder="Leave a title here" id="floatingTextarea" name="title">{{$gallery->title}}</textarea>
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>
 
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">description</label>
  <textarea class="form-control" placeholder="Leave a desc here" id="floatingTextarea" name="description">{{$gallery->description}}</textarea>
  @error('description')
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
