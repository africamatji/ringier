<div>
    @if (session('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-3" role="alert">
            <p class="font-bold">Success!</p>
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="flex">
        <input type="text" wire:model.live="searchTitle" placeholder="What are you looking for?" class="flex-1 bg-gray-100 rounded-xl py-2 px-4 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" style="background-color: #4a5568">
        <a href="{{ route('listings.create') }}" class="ml-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl">
            Create new listing
        </a>
    </div>

    <div class="flex mt-3">
        <div class="relative">
            <select wire:model.live="searchCategoryId"  id="category_id" name="category_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative">
            <select wire:model.live="sort" id="sort" name="sort" required class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Sort by</option>
                <option value="price_high">Price (High to low)</option>
                <option value="price_low">Price (Low to High)</option>
                <option value="date_new">Date (newest)</option>
                <option value="date_old">Date (oldest)</option>
            </select>
        </div>
    </div>
    @if($listings->isEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            <h4>No listings...</h4>
        </div>
    @else
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($listings as $listing)
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="{{ route('listings.details', ['id' => $listing->id ])  }}">{{ $listing->title }}</a>
                        </h5>
                    </a>
                    <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-600 dark:text-gray-400">
                        {{ $listing->currency->symbol }} {{ $listing->price }}
                    </h4>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $listing->description }}
                    </p>
                    <p class="text-gray-300 text-xs">Date Online : {{ $listing->updated_at }}</p>
                    @if ($listing->date_offline)
                        <p class="text-gray-500 text-xs">Date Offline : {{ $listing->date_offline }}</p>
                    @endif
                    <a href="{{ route('listings.details', ['id' => $listing->id ])  }}" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <div class="flex justify-center mt-4">
                {{ $listings->links() }}
            </div>
        </div>
    @endif
</div>
