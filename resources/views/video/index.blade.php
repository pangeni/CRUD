@extends('layouts/welcome')
@section('content')

<section class="content">
      <div class="container-fluid">
    <div class="d-flex justify-content-between border p-3" >
        <h2>Gallery Images</h2>
    <a href="/Gallery/create" class="btn btn-secondary" type="button"> Add Post </a> 
    </div>
    <table class="table" id="datatable">
  <thead>
    <tr>
      <th>Num<th>
      <th>id</th>
      <th>title</th>
      <th>Slug</th>
      <th>Description</th>
      <th>image</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($gallery as $a=>$gallery) 
    <tr>
    <td> {{ ++$a }}</td>
    <td> </td>
      <td> {{ $gallery->id }} </td> 
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
            <form action="/Gallery/{{$gallery->slug}}" method="gallery">
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

