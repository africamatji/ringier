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

        $message = 'Listing created';
        return redirect()->route('listings.all')->with('message', $message);
    }

    public function find()
    {

    }

    public function all()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();

        return view('listings.list', compact('listings'));
    }

    public function getById($id)
    {
        $listing = Listing::find($id);

        return view('listings.details', [
            'listing' => $listing
        ]);
    }
}
