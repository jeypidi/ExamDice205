<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="post">Post Content:</label>
                <textarea class="form-textarea w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" name="post" rows="5">{{ $post->content }}</textarea>
                @error('post')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
            <a href="{{ route('home') }}" class="block text-center mt-4 text-blue-500 hover:text-blue-700">Back</a>
        </form>
    </div>
</body>
</html>
