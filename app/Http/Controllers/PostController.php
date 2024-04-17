<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->posts()->create([
            'content' => $request->input('post'),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    // Method to update the post
    public function update(Request $request, $id)
    {
        $request->validate([
            'post' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);
        $post->content = $request->input('post');
        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully.');
    }
}