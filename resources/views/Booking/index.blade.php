@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>All Blogs</h2>
    <a href="/Booking/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="datatable">
  <thead>
    <tr>
      <th scope="col">Room type</th>
      <th scope="col">customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Room Type</th>
      <th scope="col">No. of Rooms</th>
      <th scope="col">Remarks</th>
      <th scope="col">check In  </th>
      <th scope="col">Check Out</th>
      <th scope="col">total person</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $room_details) 
    <tr>
      <th scope="row"> {{ $room_details->room_types_id }}</th>
      <td> {{ $room_details->customer_details_id }}</td>
      <td> {{ $room_details->name }}</td>
      <td> {{ $room_details->room_types }}</td>
      <td> {{ $room_details->no_of_rooms }}</td>
      <td> {{ $room_details->remarks }}</td>
      <td> {{ $room_details->check_in }}</td>
      <td> {{ $room_details->check_out }}</td>
      <td> {{ $room_details->no_of_person }}</td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/Booking/{{ $room_details->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <!-- <form action="/Booking/{{$room_details->id}}" method="post">
                @csrf 
                @method('DELETE')
             <button class="btn btn-warning" type="submit">Delete</button>
       </form> -->
        </div>
       </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>

</div>
</section>
   
  
@endsection

