<!doctype HTML>
<Title> Create Blog Post </Title>
<body> 
  <div>
<form method="POST" action="/posts" >
@csrf 
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="body">Body:</label><br>
  <input type="text" id="body" name="body">
  <button type="submit">Create</button>
</form>
<div> 
</body>
</HTML> 