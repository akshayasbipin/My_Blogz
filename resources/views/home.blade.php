<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sam.css') }}">

</head>

<body>
{{-- this when user is logged in --}}
    @auth
    <p class="logged_in">You are logged in!!!</p> 
    <form action="/logout" method="POST">
        @csrf
        <button class="logged_in_but">LOG OUT</button>
    </form>

    <div>
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="post title">
        <textarea name="body" placeholder="body content... "></textarea>
        <button>Save Post</button>
        </form>
    </div>

    <div>
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div style="background-color: gray; padding: 5px; margin: 10px">
    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
        {{$post['body']}}
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method("DELETE")
        <button>Delete</button>
        </form>
    </div>
    @endforeach
    </div>
{{-- this is when u arent logged in     --}}
    @else
    <div class="logo">
        <h1>Welcome to the Blog</h1>
    </div>
    <div>
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name = "name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    
    <div>
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name = "loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth   
</body>
</html>