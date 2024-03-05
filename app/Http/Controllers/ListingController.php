<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\ListingCreateRequest;

class ListingController extends Controller
{
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
