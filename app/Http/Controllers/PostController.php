<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    public function show(Post $post): Response
    {
        return Inertia::render('Posts/ShowPost', [
            'post' => $post->load('user'),
        ]);
    }

    public function create(): Response
    {
        //
    }
}
