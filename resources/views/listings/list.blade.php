<!-- resources/views/listings/list.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Listings</title>
</head>
<body>
<h1>All Listings</h1>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    @if($listings->isEmpty())
        <h4>No listings...</h4>
    @else
        <ul>
        @foreach ($listings as $listings)
            <li>
                <a href="{{ route('listings.details', ['id' => $listings->id ])  }}">{{ $listings->title }}</a>
            </li>
        @endforeach
        </ul>
    @endif
    <a href="{{ route('listings.create') }}">Add new</a>
</body>
</html>
