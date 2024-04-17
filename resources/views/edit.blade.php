<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Details</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full md:w-1/2">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <div class="text-lg font-semibold mb-4">Edit Details</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold mb-2">Name:</label>
                            <input type="text" class="input input-bordered w-full rounded-lg" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold mb-2">Email:</label>
                            <input type="email" class="input input-bordered w-full rounded-lg" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
                        <a href="{{ route('home') }}" class="block text-center mt-4 text-blue-500 hover:text-blue-700">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
