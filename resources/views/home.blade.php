<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-center mt-12">
            <div class="w-screen md:w-7/8"> 
                <div class="card bg-white shadow-md rounded-lg">
                    <div class="card-header bg-blue-500 text-white text-lg font-semibold py-2 px-4 text-left">DICE205</div>
                     <!-- Logout Button -->
                     <div class="text-right">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn bg-red-500 text-white btn-primary rounded-full py-1 px-3 text-left">Logout</button>
                            </form>
                        </div>
                    <div class="card-body px-4 py-6">
                        <div class="mb-6">
                            <p class="text-lg font-semibold text-gray-800 text-center">Welcome, {{ Auth::user()->name }}!</p>
                            <p class="text-sm text-gray-600 text-center">You are now logged in.</p>
                        </div>
                        <!-- User Details -->
                        <div class="mb-4 text-center">
                            <p class="mb-2"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p class="mb-2"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        </div>
                        <hr class="my-6">

                        <!-- Post Form -->
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="mb-6 text-center">
                                <label for="post" class="block text-sm font-semibold mb-2">Post something:</label>
                                <textarea class="w-full form-textarea border rounded-lg" id="post" name="post" rows="3" placeholder="Type your post here..."></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-blue-500 text-white btn-success rounded-full py-1 px-3">Post</button>
                            </div>
                        </form>

                        <hr class="my-6">

                        <!-- User Posts -->
                        <div class="text-center">
                            <h4 class="text-lg font-semibold mb-4">Your Posts:</h4>
                            @forelse (Auth::user()->posts ?? [] as $post)
                                <div class="card bg-white shadow-md rounded-lg mb-4">
                                    <div class="card-body px-4 py-2">
                                        {{ $post->content }}
                                    </div>
                                    <div class="flex justify-end px-4 py-2">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mr-2">Edit</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>No posts yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Prevent users from going back if they click the back button of the browser
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };
    </script>
</body>
</html>
