<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\ListingCreateRequest;
use App\Models\Category;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.all');
    }

    public function show()
    {
        $categories = Category::all();

        return view('listings.create', compact('categories'));
    }

    public function create(ListingCreateRequest $request)
    {
        Listing::create($request->all());

        return redirect()
            ->route('listings.home')
            ->with('message', "$request->title, created");
    }

    public function all()
    {
        return view('listings.list');
    }

    public function getById($id)
    {
        $listing = Listing::with(['category'])->find($id);

        return view('listings.details', [
            'listing' => $listing
        ]);
    }
}
