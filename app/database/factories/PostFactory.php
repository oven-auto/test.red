<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cities = \App\Models\City::pluck('id');
        $cities[] = '';

        $text = $this->faker->text(500);
        return [
            'title' => $this->faker->sentence(3),
            'body' => $text,
            'picture' => $this->faker->imageUrl(640,480),
            'annotation' => substr($text, 200),
            'favorite' => rand(0,1),
            'city_id' => $cities[rand(0, count($cities)-1)]
        ];
    }
}
