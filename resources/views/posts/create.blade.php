<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <a href="{{ route('posts.index') }}" style="float: right;margin-bottom: 10px;">Back to Post</a>
    <div>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" style="width:100%"><br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" style="width:100%" rows="10">{{ old('description') }}</textarea><br>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>