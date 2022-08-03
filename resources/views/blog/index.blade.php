@extends('layout/layout')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between border p-3" >
        <h2>All Blogs</h2>
    <a href="/posts/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">body</th>
      <th scope="col">slug</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post) 
    <tr>
      <th scope="row"> {{ $post->id }}</th>
      <td> {{ $post->title }}</td>
      <td> {{ $post->body }}</td>
      <td> {{ $post->slug }}</td>
      <td><img src="{{ asset('/images/' . $post->image) }}" alt="img" style="height:50px;width:50px;"/></td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/posts/{{ $post->slug }}/edit" >
            Edit </a>
            <form action="/posts/{{$post->slug}}" method="post">
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
<form action="{{route('logout')}}" method="post">
  @csrf
<button class="btn btn-warning" type="submit">logout</button>
</form>
    </div>

   
   
    <div>  
@endsection

