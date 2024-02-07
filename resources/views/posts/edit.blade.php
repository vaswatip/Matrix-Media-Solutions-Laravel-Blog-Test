<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <a href="{{ route('posts.index') }}" style="float: right;margin-bottom: 10px;">Back to Post</a>
    <div>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" style="width:100%"><br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" style="width:100%" rows="10">{{ old('description', $post->description) }}</textarea><br>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
