<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\ListingCreateRequest;
use App\Models\Category;

class ListingController extends Controller
{
    public function show()
    {
        $categories = Category::all();

        return view('listings.create', compact('categories'));
    }

    public function create(ListingCreateRequest $request)
    {
        Listing::create($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function find()
    {

    }

    public function all()
    {

    }

    public function getById()
    {

    }
}
