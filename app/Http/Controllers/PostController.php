<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('type')->orderBy(Post::VIEWS, 'desc')->get();
        return view('client.posts.index', compact('posts'));

    }

    public function mostviewed(): View
    {
        $posts = Post::with('type')->orderBy(Post::VIEWS, 'desc')->take(10)->get();
        return view('client.posts.index', compact('posts'));
    }

    public function newest(): View
    {
        $posts = Post::with('type')->orderBy(Post::CREATED_AT, 'desc')->take(10)->get();
        return view('client.posts.index', compact('posts'));
    }

    public function type(): View
    {
        $typeName = Request::input('type');
        if (!$typeName) {
            $posts = Post::all();
        } else {
            $posts = Post::with('type')
                ->whereHas('type', function ($query) use ($typeName) {
                    $query->where('name', $typeName);
                })->get();
        }

        return view('client.posts.index', compact('posts'));
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
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('client.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
