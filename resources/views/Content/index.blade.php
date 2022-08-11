@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>All Blogs</h2>
    <a href="/content/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Page</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">Sub Title</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($body_contents as $bodycontent) 
    <tr>
      <th scope="row"> {{ $bodycontent->id }}</th>
      <td> {{ $bodycontent->page }}</td>
      <td> {{ $bodycontent->title }}</td>
      <td> {{ $bodycontent->content }}</td>
      <td> {{ $bodycontent->sub_title }}</td>
      <td>
      @if($bodycontent->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $bodycontent->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif
      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/content/{{ $bodycontent->slug }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/content/{{$bodycontent->slug}}" method="bodycontent">
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

