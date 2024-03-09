<!-- resources/views/listings/list.blade.php -->
@extends('layouts.app')

@section('title', $listing->title)

@section('content')
    <div  x-data>
        <div x-data>
            <button @click="window.history.back()" class="ml-4 border border-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                &lt; Back
            </button>
        </div>
    </div>
    <a href="#" class="flex flex-col items-center rounded-lg shadow md:flex-row md:max-w-xl">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $listing->title  }}
            </h5>
            <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-600 dark:text-gray-400">
                {{ $listing->currency->symbol }} {{ $listing->price }}
            </h4>
            <p class="mb-3 text-xl font-normal text-gray-400 dark:text-gray-300">
                {{ $listing->description  }}
            </p>
            <p><strong>Contacts</strong> : {{ $listing->contact  }}</p>
            <p><strong>Location</strong> : {{ $listing->location  }}</p>
            <p class="mt-2 text-gray-300 text-xs">Date Online : {{ $listing->updated_at  }}</p>
            @if($listing->date_offline)
                <p class="text-gray-500 text-xs">Date Offline : {{ $listing->date_offline  }}</p>
            @endif
        </div>
    </a>
@endsection

