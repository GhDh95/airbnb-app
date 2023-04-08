<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->randomElement(['Beach', 'Sea', 'Mountain']);
        $slug = match ($name) {
            'Beach' => "fa-umbrella-beach",
            'Sea' => "fa-ship",
            'Mountain' => "fa-mountain",
            default => "",
        };
        return [
            'name'=>$name,
            'slug'=>$slug
        ];
    }
}
