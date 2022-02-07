<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(): Factory|View|Application
    {
        //
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post): Factory|View|Application
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

}
