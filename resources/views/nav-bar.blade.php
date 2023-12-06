<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Library</title>
    <link rel="stylesheet" href="{{ asset('css-lul/style.css') }}">
    <script defer src="{{asset('js-lul/script.js')}}"></script>
    <script defer src="https://kit.fontawesome.com/e7bbbc0c8d.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="primary-header">
    <div class="container-nav-bar">
        <nav class="primary-navigation">
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{ asset('img/LUL-logo.png') }}" id="logo" alt="Level Up Library"></a>
            </div>
            <div id="nav-right-side">
                <div class="nav-links desktop-nav-links">
                    <a href="{{url('/browse')}}">Browse</a>
                    <a href="/top-picks">Top Picks</a>
                </div>
                <div class="hamburger-menu">
                    <div class="hamburger-icon" onclick="toggleMenu()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    @isset($records)
                    // $records is defined and is not null...
                    @endisset

                    @empty($records)
                    // $records is "empty"...
                    @endempty      <div class="menu-links">
                        <li><a href="games.html">Browse</a></li>
                        <li><a href="/top-picks">Top Picks</a></li>
                    </div>
                </div>
                @if(Request::is('browse'))
                <div class="nav-search">
                    <label>
                        <input type="search" placeholder="Search for games" id="searchbar">
                    </label>
                </div>
                @endif
                    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                        @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">My Profile</a>
                            @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
</body>

</html>
