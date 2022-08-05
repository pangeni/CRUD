@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
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
      <th scope="col">content</th>
      <th scope="col">meta Title </th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post) 
    <tr>
      <th scope="row"> {{ $post->id }}</th>
      <td> {{ $post->title }}</td>
      <td> {{ $post->content }}</td>
      <td> {{ $post->meta_title }}</td>
      <td>
      @if($post->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $post->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif
      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/posts/{{ $post->slug }}/edit" style="margin-right:10px;" >
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
    </div>

</div>
</section>
   
  
@endsection

