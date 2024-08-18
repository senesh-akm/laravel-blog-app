<?php

namespace App\Http\Controllers;

use App\Application\Posts\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('dashboard', compact('posts'));
    }

    public function dashboard()
    {
        $posts = $this->postService->getAllPosts();
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',  // This must match the field name in the migration
            'image' => 'nullable|image|max:20480',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Store the post
        Post::create([
            'title' => $validated['title'],
            'text' => $validated['text'],  // Ensure this field is correctly referenced
            'image' => $validated['image'] ?? null,
        ]);

        // Redirect to the posts index page
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);

        if (!$post) {
            abort(404); // Post not found
        }

        return view('posts.view', compact('post'));
    }
}
