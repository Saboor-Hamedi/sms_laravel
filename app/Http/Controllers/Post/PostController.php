<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use App\Services\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostService $postService)
    {

        $posts = $postService->fetch(Auth::user()->id, 'desc');
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PostService $postService, UploadImages $uploadImages)
    {
        $validate = $request->validate([
            'title' => 'required|max:100',
            'paragraph' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',// Max 2MB
            'slug' => 'nullable|string',
            'is_published' => 'sometimes|boolean',
        ]);
        // Handle image upload

        $validate['image'] = $uploadImages->uploadImage($request->file('image'));
        $validate['is_published'] = $request->has('is_published');
        $validate['slug'] = $request->input('slug', Str::slug($request->title));
        $post = $postService->insert($validate);
        $post->tags()->attach($request['tag_id']);

        return redirect()->route('post.create')->with('status', 'Post created successfully');
    }

  

    /**
     * Display the specified resource.
     */
    public function show(string $slug, PostService $postService)
    {
        $post = $postService->show($slug);
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, PostService $postService)
    {
        $postService->deletePost($slug);
        return redirect()->route('post.index');
    }
}
