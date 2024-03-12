<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Listings</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #090f2b;
            color: #a0aec0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<div class="flex flex-col h-screen">
    <header class="flex items-center justify-between p-4 border-b border-gray-400">
        <div class="flex items-center justify-start">
            <a href="{{ route('listings.home') }}"><img src="https://www.ringier.com/wp-content/themes/ringiercorporate/assets/images/ringier-logo.svg" alt="Logo" class="h-8 mr-2"></a>
            <span class="font-bold text-lg">Listing</span>
        </div>
        <nav>
            <ul class="flex space-x-4">
                @auth
                    <li><a href="{{ route('logout') }}" class="text-white hover:text-gray-700">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-white hover:text-gray-700">Login</a></li>
                @endauth

            </ul>
        </nav>
    </header>
    <main class="flex-1 overflow-y-auto">
        <div class="container mx-auto px-4 mt-10">
            @yield('content')
        </div>
    </main>
</div>
@livewireScripts
</body>
</html>
