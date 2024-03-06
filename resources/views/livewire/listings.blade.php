<div>
    <input type="text" wire:model.live="search" placeholder="Search...">
    <h1>Listings <a href="{{ route('listings.create') }}">[+]</a></h1>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    @if($listings->isEmpty())
        <h4>No listings...</h4>
    @else
    <ul>
        @foreach ($listings as $listing)
            <li>
                <h4><a href="{{ route('listings.details', ['id' => $listing->id ])  }}">{{ $listing->title }}</a></h4>
                <p>{{ $listing->description }}</p>
            </li>
        @endforeach
    </ul>
        <p>pagination [1], [2], [3] (LivWire has pagination <code>use Livewire\WithPagination;</code>)</p>
    @endif
</div>

