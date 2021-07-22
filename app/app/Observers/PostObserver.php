<?php

namespace App\Observers;

use App\Models\Post;
use Str;

class PostObserver
{
    public function saving(Post $post)
    {
    	$post->slug = Str::slug($post->title);
    }
}
