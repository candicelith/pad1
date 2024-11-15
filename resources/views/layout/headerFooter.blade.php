<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pokari</title>
    @vite(['public/css/style.css', 'public/js/script.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/gilgan" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

    {{-- Header Start --}}
    <header id="navbar" class="fixed top-0 z-50 w-full border-gray-200 bg-white transition-shadow duration-300">
        <nav>
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/brand-blue 1.svg') }}" class="h-[58px] w-[121px]" alt="Pokari Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-400 hover:bg-cyan hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan md:hidden"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        <ul
                            class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-white p-4 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 rtl:space-x-reverse"
                        >
                            <li>
                                <a
                                    href="{{ route('home') }}"
                                    class="{{ request()->routeIs('home') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                    @if (request()->routeIs('home')) aria-current="page" @endif
                                >
                                    Home
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('posts') }}"
                                    class="{{ request()->routeIs('posts') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                    @if (request()->routeIs('posts')) aria-current="page" @endif
                                >
                                    Posts
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('alumni') }}"
                                    class="{{ request()->routeIs('alumni') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                    @if (request()->routeIs('alumni')) aria-current="page" @endif
                                >
                                    Alumni
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('companies') }}"
                                    class="{{ request()->routeIs('companies') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                    @if (request()->routeIs('companies')) aria-current="page" @endif
                                >
                                    Companies
                                </a>
                            </li>
                            <li>
                                @guest
                                    <a
                                        href="{{ route('profile') }}"
                                        class="{{ request()->routeIs('profile') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                        @if (request()->routeIs('profile')) aria-current="page" @endif
                                    >
                                        Profile
                                    </a>
                                @endguest

                                @auth
                                    @if (Auth::check() && Auth::user()->id_roles == '2')
                                        <a
                                            href="{{ route('alumni.profile') }}"
                                            class="{{ request()->routeIs('alumni.profile') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                            @if (request()->routeIs('alumni.profile')) aria-current="page" @endif
                                        >
                                            Profile
                                        </a>
                                    @elseif (Auth::check() && Auth::user()->id_roles == '3')
                                        <a
                                            href="{{ route('mahasiswa.profile') }}"
                                            class="{{ request()->routeIs('mahasiswa.profile') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                            @if (request()->routeIs('mahasiswa.profile')) aria-current="page" @endif
                                        >
                                            Profile
                                        </a>
                                    @endif
                                @endauth
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>
    </header>
    {{-- Header End --}}

    {{-- Main Start --}}
    <main>
        @yield('content')
    </main>
    {{-- Main End --}}

    {{-- Footer Start --}}
    <footer class="bg-cyan p-4 md:p-8 lg:p-10">
        <div class="mx-auto max-w-screen-xl text-center">
            <div class="flex justify-center space-x-6">
                <a href="#" class="flex items-center justify-center">
                    <img src="{{ asset('assets/logo-TRPL 1.svg') }}" class="w-20 sm:h-20 sm:w-24" alt="Pokari Logo" />
                </a>
                <a href="{{ route('home') }}" class="flex items-center justify-center">
                    <img src="{{ asset('assets/brand-white 2.svg') }}" class="w-40 sm:h-20 sm:w-44"
                        alt="Pokari Logo" />
                </a>
            </div>
            <ul class="mb-9 mt-9 flex flex-wrap items-center justify-center text-white">
                <li>
                    <a href="{{ route('home') }}" class="mr-4 hover:underline md:mr-6">HOME</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="mr-4 hover:underline md:mr-6">POSTS</a>
                </li>
                <li>
                    <a href="{{ route('alumni') }}" class="mr-4 hover:underline md:mr-6">ALUMNI</a>
                </li>
                <li>
                    <a href="{{ route('companies') }}" class="mr-4 hover:underline md:mr-6">COMPANIES</a>
                </li>
            </ul>
            <p class="my-6 text-gray-500">
                A platform to explore career journeys, alumni profiles, and job opportunities for graduates of the
                Software Engineering Technology program at Universitas Gadjah Mada. Connect with the community and
                discover various career paths.
            </p>
            <span class="text-sm text-gray-500 sm:text-center">
                © 2024.
                <a href="#" class="hover:underline">
                    Developed by Naila, Naufal, Irene, and Fagan. All right reserved
                </a>
                . All Rights Reserved.
            </span>
        </div>
    </footer>
    {{-- Footer End --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
