<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $categoryIds = collect([1, 2, 3, 4, 5]);

        return [
            Post::_TITLE => $title,
            Post::_SLUG => Str::of($title)->slug('-'),
            Post::_CONTENT => $this->faker->text(300),
            Post::_CATEGORY_ID => $categoryIds->random(),
            Post::_IS_PUBLISHED => $this->faker->boolean(),
        ];
    }
}
