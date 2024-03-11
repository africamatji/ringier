<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Listing;

class ListingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('listings.all');
    }

    public function test_shows_create_view(): void
    {
        //Data setup
        $this->createCurrency();
        $this->createCategory();
        $categories = Category::all();
        $currencies = Currency::all();
        $listings = Listing::factory()->count(3)->create();

        //Action
        $response = $this->get('/listing');

        // Assert
        $response->assertViewIs('listings.create')
            ->assertViewHasAll(['categories' => $categories, 'currencies' => $currencies]);
    }

    public function createCurrency()
    {
        //Currency
        Currency::create(['code' => 'ZAR', 'name' => 'South Africa Rands', 'symbol' => 'R']);
        Currency::create(['code' => 'USD', 'name' => 'United States Dollar', 'symbol' => '$']);
        Currency::create(['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€']);
        Currency::create(['code' => 'JPY', 'name' => 'Japanese Yen', 'symbol' => '¥']);
        Currency::create(['code' => 'GBP', 'name' => 'British Pound Sterling', 'symbol' => '£']);
    }

    public function createCategory()
    {
        //Category
        Category::create(['name' => 'Furniture', 'created_at' => now(), 'updated_at' => now() ]);
        Category::create(['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()]);
        Category::create(['name' => 'Cars', 'created_at' => now(), 'updated_at' => now()]);
        Category::create(['name' => 'Property', 'created_at' => now(), 'updated_at' => now()]);
    }

}
