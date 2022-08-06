@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>Gallery Images</h2>
    <a href="/Gallery/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($galleries as $gallery) 
    <tr>
      <th scope="row"> {{ $gallery->id }}</th>
      <td> {{ $gallery->title }}</td>
      <td> {{ $gallery->slug }}</td>
      <td> {{ $gallery->description }}</td>
      <td>
      @if($gallery->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $gallery->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif
      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/Gallery/{{ $gallery->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/Gallery/{{$gallery->id}}" method="gallery">
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

