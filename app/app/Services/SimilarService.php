<?php

namespace App\Services;

use DB;
use App\Models\Post;

Class SimilarService
{
    public function getSimilar($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = $post->tags->pluck('id');

        $posts = Post::select('posts.*', DB::raw('count(post_tags.tag_id) as count'))
            ->fullData()
            ->leftJoin('post_tags', 'post_tags.post_id', '=', 'posts.id')
            ->whereIn('post_tags.tag_id', $tags)
            ->where('posts.id', '<>', $post->id)
            ->groupBy('posts.id')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();

        return $posts;
    }
}
