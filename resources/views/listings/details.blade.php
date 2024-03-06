<!-- resources/views/listings/list.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings Details</title>
</head>
<body>
<h1>{{ $listing->title  }}</h1>
<div>
    <p>Description : {{ $listing->description  }}</p>
    <p>Price : {{ $listing->price  }}</p>
    <p>Location : {{ $listing->location  }}</p>
</div>
</body>
</html>
