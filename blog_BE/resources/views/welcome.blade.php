<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Link to your CSS -->
</head>
<body>
<div class="container">
    <h1>Blog Posts</h1>
    @foreach ($blogs as $blog)
        <div class="blog-post">
            <h2>{{ $blog->title }}</h2>
            <div>{!! $blog->body !!}</div>
        </div>
    @endforeach
</div>
</body>
</html>
