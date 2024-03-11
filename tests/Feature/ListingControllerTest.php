<?php

namespace Tests\Feature;

use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Currency;
use App\Http\Controllers\ListingController;
use App\Http\Requests\ListingCreateRequest;
use Illuminate\Http\RedirectResponse;

class ListingControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_index(): void
    {
        //Action
        $controller = new ListingController();
        $response = $controller->index();

        // Assertion
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('listings.all', $response->getName());
    }

    public function test_shows_create_view(): void
    {
        //Action
        $controller = new ListingController();
        $response = $controller->showCreate();

        // Assertion
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('listings.create', $response->getName());
        $this->assertArrayHasKey('categories', $response->getData());
        $this->assertArrayHasKey('currencies', $response->getData());
    }

    public function test_listing_creation(): void
    {
        $this->createCategory();
        $this->createCurrency();

        // Create a mock request with dummy data
        $request = new ListingCreateRequest([
            'title' => 'Test Listing',
            'description' => 'Test description',
            'price' => 100.00,
            'location' => 'Test location',
            'contact' => 'Test contact',
            'category_id' => 3,
            'currency_id' => 2,
        ]);

        // validate request
        $request->validate($request->rules());

        //Action
        $controller = new ListingController();
        $response = $controller->create($request);

        //Assertion
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('listings.home'), $response->getTargetUrl());
        $this->assertEquals("$request->title, created", session('message'));
    }

    public function test_get_listing()
    {
        //mock model
        $listing = $this->createMock(Listing::class);
        //Action
        $controller = new ListingController();
        $response = $controller->getListing($listing);
        //Assertion
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('listings.details', $response->getName());
        $this->assertEquals($listing->toArray(), $response->getData()['listing']->toArray());
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
    }
}
