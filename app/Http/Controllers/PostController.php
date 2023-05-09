<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts=Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.form');
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id=$user_id;
        $post->save();

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    // Show the form for editing the specified post
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.form', ['post' => $post]);
    }

    // Update the specified post in the database
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);


        $post=Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from the database
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
