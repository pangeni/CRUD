@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>All Blogs</h2>
    <a href="/Customer/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="datatable">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">name</th>
      <th scope="col">Address</th>
      <th scope="col">Email Address </th>
      <th scope="col">Phone Number</th>
      <th scope="col">Identification Number</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($customer as $customerDetails) 
    <tr>
      <th scope="row"> {{ $customerDetails->id }}</th>
      <td> {{ $customerDetails->title }}</td>
      <td> {{ $customerDetails->name }}</td>
      <td> {{ $customerDetails->address }}</td>
      <td> {{ $customerDetails->email }}</td>
      <td> {{ $customerDetails->number }}</td>
      <td> {{ $customerDetails->identity }}</td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/Customer/{{ $customerDetails->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/Customer/{{$customerDetails->id}}" method="post">
                @csrf 
                @method('DELETE')
             <button class="btn btn-warning" type="submit">Delete</button>
       </form>
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

