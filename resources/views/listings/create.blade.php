<!-- resources/views/listings/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create listing')

@section('content')
    <h5 class="max-w-sm mx-auto mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Create Listing
    </h5>

    <form method="POST" action="{{ route('listings.store') }}" class="max-w-sm mx-auto">
        @csrf

        <input type="text" id="title" name="title" required placeholder="Enter Title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568"><br>

        <textarea id="description" name="description" required placeholder="Enter Description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568"></textarea><br>

        <div style="display: flex; gap: 10px;">
        <input type="number" id="price" name="price" step="0.01" placeholder="Enter Price" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568"><br>

        <input type="text" id="location" name="location" required placeholder="Enter Location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568"><br>
        </div>

        <input type="text" id="contact" name="contact" required placeholder="Your Email or Phone number" class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568"><br>

        <div style="display: flex; gap: 10px;">
            <div style="flex-grow: 1;">
                <select id="category_id" name="category_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div style="flex-grow: 1;">
                <select id="currency_id" name="currency_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" style="background-color: #4a5568">
                    <option value="">Select Currency</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}">({{ $currency->symbol }}) {{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
    </form>
@endsection
