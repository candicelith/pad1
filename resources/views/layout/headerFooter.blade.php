<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nav</title>
    @vite(['public/css/style.css', 'public/js/script.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/gilgan" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Header Start -->
    <header id="navbar" class="bg-white border-gray-200 sticky top-0 z-50 transition-shadow duration-300">
        <nav>
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/brand-blue 1.svg') }}" class="w-[121px] h-[58px]" alt="Pokari Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-cyan hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-white md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 {{ request()->routeIs('home') ? 'text-cyan' : 'text-gray-400' }} md:hover:text-cyan text-xl rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"
                                @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}"
                                class="block py-2 px-3 {{ request()->routeIs('posts') ? 'text-cyan' : 'text-gray-400' }} md:hover:text-cyan text-xl rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"
                                @if (request()->routeIs('posts')) aria-current="page" @endif>Posts</a>
                        </li>
                        <li>
                            <a href="{{ route('alumni') }}"
                                class="block py-2 px-3 {{ request()->routeIs('alumni') ? 'text-cyan' : 'text-gray-400' }} md:hover:text-cyan text-xl rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"
                                @if (request()->routeIs('alumni')) aria-current="page" @endif>Alumni</a>
                        </li>
                        <li>
                            <a href="{{ route('companies') }}"
                                class="block py-2 px-3 {{ request()->routeIs('companies') ? 'text-cyan' : 'text-gray-400' }} md:hover:text-cyan text-xl rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"
                                @if (request()->routeIs('companies')) aria-current="page" @endif>Companies</a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"
                                class="block py-2 px-3 {{ request()->routeIs('profile') ? 'text-cyan' : 'text-gray-400' }} md:hover:text-cyan text-xl rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"
                                @if (request()->routeIs('profile')) aria-current="page" @endif>Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        @yield('content')
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer class="p-4 bg-cyan md:p-8 lg:p-10">
        <div class="mx-auto max-w-screen-xl text-center">
            <div class="flex justify-center space-x-6">
                <a href="#" class="flex justify-center items-center">
                    <img src="{{ asset('assets/logo-TRPL 1.svg') }}" class="w-[178px] h-[80px]" alt="Pokari Logo" />
                </a>
                <a href="{{ route('home') }}" class="flex justify-center items-center">
                    <img src="{{ asset('assets/brand-white 2.svg') }}" class="w-[178px] h-[80px]" alt="Pokari Logo" />
                </a>
            </div>
            <ul class="flex flex-wrap justify-center items-center mb-9 mt-9 text-white">
                <li>
                    <a href="{{ route('home') }}" class="mr-4 hover:underline md:mr-6 ">Home</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="mr-4 hover:underline md:mr-6">Posts</a>
                </li>
                <li>
                    <a href="{{ route('alumni') }}" class="mr-4 hover:underline md:mr-6 ">Alumni</a>
                </li>
                <li>
                    <a href="{{ route('companies') }}" class="mr-4 hover:underline md:mr-6">Companies</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="mr-4 hover:underline md:mr-6">Profile</a>
                </li>
            </ul>
            <p class="my-6 text-gray-500">Website for Software Engineering Techology student searching alumni's
                information.
            </p>
            <span class="text-sm text-gray-500 sm:text-center">© 2024. <a href="#"
                    class="hover:underline">Developed by Naila, Naufal, Irene, and Fagan. All right reserved</a>. All
                Rights Reserved.
            </span>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
