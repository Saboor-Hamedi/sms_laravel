<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\UploadImages;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function Flasher\Prime\flash;

class PostController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(PostService $postService)
    {
        $posts = $postService->fetchPost(Auth::user()->id, 'desc');

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryService $categoryService)
    {
        $categories = $categoryService->fetchCategory();

        return view('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PostService $postService, UploadImages $uploadImages)
    {
        $validate = $request->validate([
            'title' => 'required|max:100',
            'paragraph' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'is_published' => 'sometimes|boolean',
            'tags' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        // Handle image upload
        $validate['image'] = $uploadImages->uploadImage($request->file('image'));
        $validate['is_published'] = $request->has('is_published');
        $validate['slug'] = $request->input('slug', Str::slug($request->title));
        $validate['category_id'] = $request->input('category_id', null);
        $post = $postService->insertPost($validate);

        if ($request->has('tags')) {
            $post->tags()->attach($postService->handleTags($request->tags));
        }

        flash()
            ->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])
            ->success('Operation completed successfully.');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, PostService $postService)
    {

        try {
            $post = $postService->showPost($slug);
            $this->authorize('view', $post);

            return view('post.show', ['post' => $post]);
        } catch (AuthorizationException $e) {
            flash()->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])->info('You have no permission.');
        }

        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, PostService $postService, CategoryService $categoryService)
    {
        session(['previous_url' => url()->previous()]);
        $post = $postService->showPost($slug);
        $categories = $categoryService->fetchCategory();
        $this->authorize('update', $post);

        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug, PostService $postService, UploadImages $uploadImages)
    {

        $post = $postService->showPost($slug);
        $this->authorize('update', $post);
        $validate = $request->validate([
            'title' => 'required|max:100',
            'paragraph' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|string',
            'is_published' => 'sometimes|boolean',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $uploadImages->uploadImage($request->file('image'));
        }
        try {
            $validate['is_published'] = $request->has('is_published');
            $validate['category_id'] = $request->input('category_id', null);

            if ($request->has('tags')) {
                $post->tags()->sync($postService->handleTags($request->tags));
            } else {
                $post->tags()->sync([]);
            }
            $postService->updatePost($slug, $validate);

            flash()->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])->success('Operation completed successfully.');
        } catch (Exception $e) {
            flash()->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])->info('Operation failed');
        }

        return redirect(session('previous_url', route('post.index')));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, PostService $postService)
    {
        try {
            $post = $postService->showPost($slug);
            $this->authorize('delete', $post);
            $postService->deletePost($slug);
            flash()->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])->info('Operation completed successfully.');
        } catch (AuthorizationException $e) {
            flash()->options([
                'timeout' => config('customconfig.timetime'),
                'position' => config('customconfig.position'),
            ])->warning('Operation failed.');
        }

        return redirect()->route('post.index');
    }
}
