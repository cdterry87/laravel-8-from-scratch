<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString() // withQueryString will include any existing query strings with the pagination
            // )->simplePaginate() // Just adds simple next/previous buttons instead of page buttons
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
