<?php

namespace App\Livewire;

use App\Models\Listing;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Listings extends Component
{
    public $listings;
    public $search = '';

/*    public function mount()
    {
        $this->listings = Listing::orderBy('created_at', 'desc')->get();
    }*/

    public function render()
    {
        Log::info('search', [$this->search]);
        $this->listings = Listing::where(function ($query) {
            $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.listings');
    }
}
