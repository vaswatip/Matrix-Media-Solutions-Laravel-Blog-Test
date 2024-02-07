<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Posts</title>
        <style>
            table, th, td {
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" style="float: right;margin-bottom: 10px;">Create New Post</a>
        @if(session('success'))
            <b>Success:: {{ session('success') }}</b>
        @elseif(session('error'))
            <b>Error:: {{ session('success') }}</b>
        @endif
        <table style="width:100%">
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            @if($posts->count())
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td><a href="{{ route('posts.edit', ['post' => $post->id ]) }}">Edit</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No Post Found.</td>
                </tr>
            @endif
        </table>
    </body>
</html>