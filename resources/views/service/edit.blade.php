@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/service/{{$service->id}}" enctype='multipart/form-data'>
@csrf 
@method('PUT')
<h1>Edit Data</h1>
    <hr/>
<div class="row">
  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <textarea class="form-control" placeholder="Leave a title here" id="floatingTextarea" name="title">{{$service->title}}</textarea>
  @error('title')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>
  <div class="col-md-6 mb-3">
  <label class="form-label"> Check Status </label>
<select class="form-select" name="status" aria-label="Default select example">
  <option value="1">Enable</option>
  <option value="0">Disable</option>
  
</select>
</div>
<div class="col-md-12 mb-3">
<label for="exampleFormControlInput1" class="form-label">description</label>
  <textarea class="form-control" placeholder="Leave a contect here" id="floatingTextarea" name="description">{{$service->description}}</textarea>
  @error('description')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-3 mb-3">
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
