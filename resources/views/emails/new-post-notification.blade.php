<!DOCTYPE html>
<html>
<head>
    <title>New Post Notification</title>
</head>
<body>
    <p>A new post has been created by {{ $post->user->name }}.</p>
    <p>Title: {{ $post->title }}</p>
    <p>Description: {{ $post->description }}</p>
</body>
</html>
