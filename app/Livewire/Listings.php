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
    public $search_category_id = null;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Listing::orderBy('created_at', 'desc');
        $categories = Category::all();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }
        if (!empty($this->search_category_id)) {
            $query->where('category_id', $this->search_category_id);
        }
        $listings = $query->paginate(5);

        return view('livewire.listings', [
            'listings' => $listings,
            'categories' => $categories
        ]);
    }
}
