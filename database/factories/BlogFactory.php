<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "Blog {$this->faker->name}",
            'description' => $this->faker->text,
            'thumbnail' => 'https://picsum.photos/200',
            'category_id' => $this->faker->numberBetween(5, 6),
            'user_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
