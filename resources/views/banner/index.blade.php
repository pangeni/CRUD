@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>Banner For Front Pages</h2>
    <a href="/banner/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">Sub_title</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($banners as $banner) 
    <tr>
      <th scope="row"> {{ $banner->id }}</th>
      <td> {{ $banner->title }}</td>
      <td> {{ $banner->sub_title }}</td>
      <td>
      @if($banner->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $banner->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif
      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/banner/{{ $banner->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/banner/{{$banner->id}}" method="banner">
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

