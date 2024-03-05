<!-- resources/views/listings/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Listing</title>
</head>
<body>
<h1>Create Listing</h1>

<form method="POST" action="{{ route('listings.store') }}">
    @csrf

    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="category_id">Category:</label><br>
    <select id="category_id" name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <button type="submit">Create Listing</button>
</form>
</body>
</html>
