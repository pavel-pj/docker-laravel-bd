<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = Post::all(); 
        return view('posts/index', ['posts' => $posts] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Сохранить новый пост (posts.store)
    public function store(Request $request): RedirectResponse
    {
        // Валидация данных
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:posts,slug',
            'text' => 'nullable|string',
            // Добавьте другие поля если нужно
        ]);

        // Создание поста
        Post::create($validated);

        // Редирект с сообщением об успехе
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $post = Post::findOrFail($id);
        return view('posts/show', ['post' => $post] );;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts/edit');
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
