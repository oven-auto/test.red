<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Tag;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::factory(5)->create();
        Tag::factory(5)->create();
        Post::factory(10)->create();

        $posts = Post::get();
        $tags = Tag::pluck('id');

        foreach($posts as $itemPost) {
            $randomTags = [
                $tags[rand(0, count($tags) - 1)],
                $tags[rand(0, count($tags) - 1)],
                $tags[rand(0, count($tags) - 1)],
            ];
            $itemPost->tags()->sync($randomTags);
        }
    }
}
