@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
  <div class="inertform py-5">
  <form method="POST" class="border p-4" action="/Booking" enctype='multipart/form-data'>
    <h1>Booking Form</h1>
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
<label for="exampleFormControlInput1" class="form-label"> identity</label>
<textarea class="form-control" placeholder="Leave a identity  here" id="floatingTextarea" name="identity"></textarea>
</div>

<div class="col-md-6 mb-3">
<select class="form-select form-control" aria-label="Default select example" name="room_types">
  <option selected disable>Select Room Type</option>
  @foreach ($data as $a)
  <option value="{{ $a->id }}"> {{ $a->room_types }}</option>
  @endforeach
</select>
</div>

  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">No of Rooms</label>
  <textarea class="form-control" placeholder="Leave a title here" id="floatingTextarea" name="no_of_rooms"></textarea>
  @error('no_of_rooms')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>

  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">check_in</label>
  <input class="form-control" placeholder="Leave a check_in here" id="floatingTextarea" name="check_in" type="date"></input>
  @error('check_in')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>

  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">chek_out</label>
  <input class="form-control" placeholder="Leave a chek_out here" id="floatingTextarea" name="check_out" type="date"></input>
  @error('chek_out')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>

  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">no_of_person</label>
  <textarea class="form-control" placeholder="Leave a no_of_person here" id="floatingTextarea" name="no_of_person"></textarea>
  @error('no_of_person')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>

  <div class="col-md-6 mb-3">
  <label for="exampleFormControlInput1" class="form-label">remarks</label>
  <textarea class="form-control" placeholder="Leave a remarks here" id="floatingTextarea" name="remarks"></textarea>
  @error('remarks')
  <span style="color:red">{{$message.'*'}}</span>
  @enderror
  </div>

</div>
  <button type="submit" class="btn btn-secondary w-100">Create</button>
</form>
</div>
</div>
</section>

@endsection
