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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

    <header id="navbar" class="fixed top-0 z-50 w-full border-gray-200 bg-white transition-shadow duration-300">
        <nav class="w-64">
            <div class="mx-auto flex justify-center p-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/brand-blue 1.svg') }}" class="h-[58px] w-[121px]" alt="Pokari Logo" />
                </a>
            </div>
        </nav>
    </header>


    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r bg-cyan-100 pt-28 transition-transform sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-cyan-100 px-3 pb-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="group flex items-center rounded-lg p-2 text-white">
                        <div class="rounded-full bg-white p-2">
                            <svg class="h-11 w-11 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div class="ms-3">
                            <p class="text-base">Naufal Daffachri</p>
                            <span class="text-sm text-gray-300">Admin</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="group flex items-center rounded-lg p-2 text-white hover:bg-white hover:text-cyan-100 dark:text-white dark:hover:bg-gray-700">
                        <span class="ms-3 flex-1 whitespace-nowrap">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="group flex items-center rounded-lg p-2 text-white hover:bg-white hover:text-cyan-100 dark:text-white dark:hover:bg-gray-700">
                        <span class="ms-3 flex-1 whitespace-nowrap">Alumni</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>


    {{-- Header Start --}}
    {{-- <header id="navbar" class="fixed top-0 z-50 w-full border-gray-200 bg-white transition-shadow duration-300">
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
                        class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-white p-4 rtl:space-x-reverse md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0">
                        <li>
                            <a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                @if (request()->routeIs('home')) aria-current="page" @endif>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}"
                                class="{{ request()->routeIs('posts') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                @if (request()->routeIs('posts')) aria-current="page" @endif>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('alumni') }}"
                                class="{{ request()->routeIs('alumni') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                @if (request()->routeIs('alumni')) aria-current="page" @endif>
                                Alumni
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('companies') }}"
                                class="{{ request()->routeIs('companies') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                @if (request()->routeIs('companies')) aria-current="page" @endif>
                                Companies
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"
                                class="{{ request()->routeIs('profile') ? 'text-cyan' : 'text-gray-400' }} block rounded px-3 py-2 text-xl hover:bg-cyan-100 hover:text-cyan md:border-0 md:p-0 md:hover:bg-transparent"
                                @if (request()->routeIs('profile')) aria-current="page" @endif>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> --}}
    {{-- Header End --}}

    {{-- Main Start --}}
    <main>
        @yield('admincontent')
    </main>
    {{-- Main End --}}
</body>

</html>
