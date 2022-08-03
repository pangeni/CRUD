<!DOCTYPE HTML> 

<head> 
<title>My Blog</title> 
</head> 

<button href="/posts/create"> Add Post </button> 
<body> 
    <div>
        <Title> My Blog </title> 
    @foreach ($posts as $post) 
    <article>
        <h1> 
            <a href="/posts/{{ $post->id }}/edit" >
            {{ $post->title }} </a> 
        </h1> 
        <div>
            {{ $post->body }}
        </div>    
    </article>
    @endforeach
    <div> 
</body>
</HTML> 


