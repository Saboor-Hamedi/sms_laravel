<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostService $postService)
    {

        $posts = $postService->fetch(Auth::user()->id);

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
    public function store(Request $request, PostService $postService)
    {
        $validate = $request->validate([
        'title' => 'required|max:100', 
        'paragraph' => 'required|string',
        'is_published' => 'sometimes|boolean',
        ]);
        $validate['is_published'] = $request->has('is_published');
        $post = $postService->insert($validate);
        $post->tags()->attach($request['tag_id']);
        return redirect()->route('post.create')->with('status', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
