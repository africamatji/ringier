<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class Listings extends Component
{
    use WithPagination;
    public $searchTitle = '';
    public $sort = '';
    public $searchCategoryId = null;
    public $totalCount = 0;

    public function updatingSearchTitle()
    {
        $this->resetPage();
    }

    public function updatingSearchCategoryId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Listing::query();
        $categories = Category::all();

        $this->totalCount = $query->count();
        if (!empty($this->searchTitle)) {
            $query = $this->searchTitle($query);
        }
        if (!empty($this->searchCategoryId)) {
            $query = $this->searchCategory($query);
        }
        if(!empty($this->sort))
        {
            $query = $this->sort($query);
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }
        $listings = $query->paginate(5);

        return view('livewire.listings', [
            'listings' => $listings,
            'categories' => $categories
        ]);
    }

    public function searchTitle($query)
    {
        $query->where(function ($q) {
            $q->where('title', 'like', '%' . $this->searchTitle . '%');
        });

        return $query;
    }

    public function searchCategory($query)
    {
        return $query->where('category_id', $this->searchCategoryId);
    }

    public function sort($query)
    {
        switch ($this->sort) {
            case 'price_high':
                $query->orderByRaw('CAST(price AS DECIMAL(10,2)) DESC');
                break;
            case 'price_low':
                $query->orderByRaw('CAST(price AS DECIMAL(10,2)) ASC');
                break;
            case 'date_new':
                $query->orderBy('created_at', 'desc');
                break;
            case 'date_old':
                $query->orderBy('created_at', 'asc');
                break;
        }

        return $query;
    }
}
