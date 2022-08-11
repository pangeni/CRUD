@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/Customer" enctype='multipart/form-data'>
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
 
<label for="exampleFormControlInput1" class="form-label">Name</label>
<textarea class="form-control" placeholder="Leave a Name here" id="floatingTextarea" name="name"></textarea>
@error('name')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Address</label>
<textarea class="form-control" placeholder="Leave a Address  here" id="floatingTextarea" name="address"></textarea>
@error('address')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Phone number</label>
<textarea class="form-control" placeholder="Leave a number  here" id="floatingTextarea" name="number"></textarea>
</div>
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label">Email</label>
  <textarea class="form-control" placeholder="Leave a Email Address here" id="floatingTextarea" name="email"></textarea>
  @error('email')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
</div>
<div class="col-md-6 mb-3">
<div class="col-md-6 mb-3">
<label for="exampleFormControlInput1" class="form-label"> identity</label>
<textarea class="form-control" placeholder="Leave a identity  here" id="floatingTextarea" name="identity"></textarea>
</div>
</div>
  <button type="submit" class="btn btn-secondary w-100">Create</button>
</form>
  </div>

</div>
</div>
</section>

@endsection
