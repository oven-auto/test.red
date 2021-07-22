<?php

namespace App\Http\Controllers\Api\v1\Front\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::fullData();

        if($request->has('favorite'))
            $query->onlyFavorite();
        if($request->has('city_id'))
            $query->byCity($request->get('city_id'));

        $posts = $query->get();

        return $posts;
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->city;
        $post->tags;

        return $post;
    }

    public function favorite(Post $post)
    {
        if($post->favorite == 0)
            $post->fill(['favorite' => 1])->save();
        else
            $post->fill(['favorite' => 0])->save();

        return response()->json([
            'status' => $post->favorite
        ]);
    }

    public function similar($slug, \App\Services\SimilarService $service)
    {
        $posts = $service->getSimilar($slug);
        return response()->json([
            'similars' => $posts
        ]);
    }
}
