@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>services Images</h2>
    <a href="/service/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>
    <table class="table" id="datatable">
  <thead>
    <tr>
      <th>id</th>
      <th>title</th>
      <th>Slug</th>
      <th>Description</th>
      <th>Status</th>
      <th>image</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($service as $services) 
    <tr>
      <td> {{ $services->id }} </td> 
      <td> {{ $services->title }}</td>
      <td> {{ $services->slug }}</td>
      <td> {{ $services->description }}</td>
      <td> @if($services->status == 1) 
      <span style="background:green; color:white; padding:10px; boarder:none; border-radius:10px;">Active</span>
           @else 
           <span style="background:red; color:white; padding:10px; boarder:none; border-radius:10px;">De-active</span>
           @endif
      </td>
      <td>
      @if($services->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $services->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif

      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/service/{{ $services->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/service/{{$services->slug}}" method="service">
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
<div class="card text-info">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                     @endif   
</div> 
   
  
@endsection

