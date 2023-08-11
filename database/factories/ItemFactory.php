<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "Item {$this->faker->name}",
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(2),
            'thumbnail' => 'https://picsum.photos/200',
            'category_id' => $this->faker->numberBetween(1, 4),
            'voucher_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
