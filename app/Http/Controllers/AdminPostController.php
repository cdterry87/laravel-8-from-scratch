<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    protected function validatePost(?Post $post = null): array // ? means Post is optional and default is null
    {
        $post ??= new Post(); // If $post is null, create a new Post()

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'required'
        ]);
    }

    public function store()
    {
        $attrs = $this->validatePost();

        $attrs['user_id'] = auth()->id();
        $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attrs);

        return redirect('/post/' . $attrs['slug']);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attrs = $this->validatePost($post);

        if (isset($attrs['thumbnail'])) {
            $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attrs);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
