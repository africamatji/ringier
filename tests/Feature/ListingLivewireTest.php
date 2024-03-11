<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Listing;
use App\Livewire\Listings;

class ListingLivewireTest extends TestCase
{
    use RefreshDatabase;

    public function test_render_with_listings(): void
    {
        $categories = $this->createCategory();
        $currencies = $this->createCurrency();
        $listings = Listing::factory()->count(10)->create();
        $text = $listings->count() . " total listings";

        Livewire::test(Listings::class)
            ->set('listings', $listings)
            ->set('currencies', $currencies)
            ->set('categories', $categories)
            ->assertSee($text);
    }

    public function test_render_with_no_listings(): void
    {
        $categories = $this->createCategory();
        $currencies = $this->createCurrency();
        $listings = [];
        $text = "No listings...";

        Livewire::test(Listings::class)
            ->set('listings', $listings)
            ->set('currencies', $currencies)
            ->set('categories', $categories)
            ->assertSee($text);
    }

    public function createCurrency()
    {
        $currencies = [
            ['code' => 'ZAR', 'name' => 'South Africa Rands', 'symbol' => 'R'],
            ['code' => 'USD', 'name' => 'United States Dollar', 'symbol' => '$'],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['code' => 'JPY', 'name' => 'Japanese Yen', 'symbol' => '¥'],
            ['code' => 'GBP', 'name' => 'British Pound Sterling', 'symbol' => '£'],
        ];
        Currency::insert($currencies);

        return Currency::all();
    }

    public function createCategory()
    {
        $categories = [
            ['name' => 'Furniture', 'created_at' => now(), 'updated_at' => now() ],
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cars', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Property', 'created_at' => now(), 'updated_at' => now()]
        ];
        Category::insert($categories);

        return Category::all();
    }
}
