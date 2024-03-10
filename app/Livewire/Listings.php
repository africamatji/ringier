<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class Listings extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = '';
    public $search_category_id = null;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Listing::query();
        $categories = Category::all();

        if (!empty($this->search)) {
            $query = $this->searchTitle($query);
        }
        if (!empty($this->search_category_id)) {
            $query = $this->searchCategory($query);
        }
        if(!empty($this->sort))
        {
            $query = $this->sort($query);
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
            $q->where('title', 'like', '%' . $this->search . '%');
        });

        return $query;
    }

    public function searchCategory($query)
    {
        return $query->where('category_id', $this->search_category_id);
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
                $query->orderBy('updated_at', 'asc');
                break;
        }

        return $query;
    }
}
