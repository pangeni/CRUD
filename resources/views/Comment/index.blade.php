@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>Comment Images</h2>
    <a href="/Comment/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>

    <div class="table-responsive">
    <table class="table table-striped" id="datatable">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Company Name</th>
      <th scope="col">Customer Messages</th>
      <th scope="col">image</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($comments as $comment) 
    <tr>
      <th scope="row"> {{ $comment->id }}</th>
      <td> {{ $comment->name }}</td>
      <td> {{ $comment->company }}</td>
      <td> {{ $comment->message }}</td>
      <td>
      @if($comment->image==null)
      <p>Image not uplaoded</p>
       @else
        <img src="{{ asset('/images/' . $comment->image) }}" alt="image" style="height:50px;width:50px;"/>
        @endif
      </td>
      <td>
        <div class="d-flex">
        <a class="btn btn-secondary me-3" type="submit" href="/comment/{{ $comment->id }}/edit" style="margin-right:10px;" >
            Edit </a>
            <form action="/Comment/{{$comment->id}}" method="comment">
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

