<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = Currency::pluck('id');
        $categories = Category::pluck('id');
        $date = $this->faker->optional()->dateTimeBetween('-1 year', 'now');
        $date_offline = $date ? $date->format('Y-m-d H:i:s') : null;
        $title = $this->faker->sentence( 3, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph( 1,  true),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_offline' => $date_offline,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'location' => $this->faker->address,
            'contact' => $this->faker->randomElement([$this->faker->email, $this->faker->phoneNumber]),
            'category_id' => $this->faker->randomElement($categories),
            'currency_id' => $this->faker->randomElement($currencies),
        ];
    }
}
