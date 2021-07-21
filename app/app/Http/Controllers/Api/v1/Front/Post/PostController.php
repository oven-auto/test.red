<?php

namespace App\Http\Controllers\Api\v1\Front\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::fullData();
        if($request->has('favorite'))
            $query->onlyFavorite();
        $posts = $query->get();
        return $posts;
    }

    public function show(Post $post)
    {
        $post->city;
        $post->tags;
        return $post;
    }
}
