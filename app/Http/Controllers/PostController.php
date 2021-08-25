<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        // ddd(Gate::allows('admin'));
        // request()->user()->can('admin'); // returns a boolean
        // $this->authorize('admin'); // will automatically return a 403 if it fails; otherwise it proceeds

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
