<?php

namespace App\Http\Controllers;

use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FrontService $frontService)
    {
        $frontPost = $frontService->fetchPost();

        return view('welcome', ['frontPost' => $frontPost]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, FrontService $frontService)
    {

        $post = $frontService->showPost($slug);
        $relatedPost = $frontService->relatedPosts($post);

        return view('front.show', ['post' => $post, 'relatedPost' => $relatedPost]);
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
