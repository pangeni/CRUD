<!doctype HTML>
<Title> Edit Blog Post </Title>
<body> 
<form method="POST" action="/posts/{{ $post->id }}" >
@method('PUT')
@csrf
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title" value="{{ $post->title }}" ><br>
  <label for="body">Body:</label><br>
  <input type="text" id="body" name="body" value="{{ $post->body }}" >
  <button type="submit">update</button>
  <button href="/">Go Back</button>
  <form action="posts/{{ $post->id }}"> 
    @csrf 
    @method('DELETE')
    <Button type="Submit"> Delete </Button> 
</form>
</form>
</body>
</HTML> 