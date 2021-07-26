<?php

namespace Database\Factories\WebSelf;

use App\Models\Comment;
use App\Models\WebSelf\Post;
use App\Models\WebSelf\Rubric;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
           'title' => $this->faker->words(3, true),
            'content' => $this->faker->paragraph,
            'rubric_id' => Rubric::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTime(),
            'comment_id' => 1
        ];
    }
}
