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

    <!-- Navbar -->
    <header id="navbar" class="fixed top-0 z-40 w-full border-gray-200 bg-white transition-shadow duration-300">
        <nav class="flex items-center justify-between p-4">
            <!-- Hamburger Button (Visible only on small screens) -->
            <button id="hamburger-btn" class="p-2 text-black lg:hidden">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="me-auto flex justify-center sm:-me-10 sm:ms-10 sm:justify-start">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/brand-blue 1.svg') }}" class="h-[58px] w-[121px]" alt="Pokari Logo" />
                </a>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-30 h-full w-64 -translate-x-full border-r bg-cyan-100 pt-28 transition-transform sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-cyan-100 px-3 pb-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.profile') }}"
                        class="group flex items-center rounded-lg bg-cyan-100 p-2 text-white">
                        <div class="rounded-full bg-white p-2">
                            <svg class="h-11 w-11 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div class="ms-3">
                            <p class="text-base">{{ Auth::user()->userDetails->name }}</p>
                            <span class="text-sm text-gray-300">Admin</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home') }}"
                        class="{{ request()->routeIs('admin.home', 'admindetailalumni', 'admin.approval') ? 'text-cyan-100 bg-white' : 'text-white' }} group flex items-center rounded-lg p-2 hover:bg-white hover:text-cyan-100"
                        @if (request()->routeIs('admin.home', 'admindetailalumni', 'admin.approval')) aria-current="page" @endif>
                        <span class="ms-3 flex-1 whitespace-nowrap">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.alumni') }}"
                        class="{{ request()->routeIs('admin.alumni', 'admin.detail-alumni', 'admin.edit-alumni.experiences') ? 'text-cyan-100 bg-white' : 'text-white' }} group flex items-center rounded-lg p-2 hover:bg-white hover:text-cyan-100 dark:text-white dark:hover:bg-gray-700"
                        @if (request()->routeIs('admin.alumni', 'admin.detail-alumni', 'admin.edit-alumni.experiences')) aria-current="page" @endif>
                        <span class="ms-3 flex-1 whitespace-nowrap">Alumni</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.company') }}"
                        class="{{ request()->routeIs('admin.company') ? 'text-cyan-100 bg-white' : 'text-white' }} group flex items-center rounded-lg p-2 hover:bg-white hover:text-cyan-100 dark:text-white dark:hover:bg-gray-700"
                        @if (request()->routeIs('admin.company')) aria-current="page" @endif>
                        <span class="ms-3 flex-1 whitespace-nowrap">Company</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news') }}"
                        class="{{ request()->routeIs('admin.news') ? 'text-cyan-100 bg-white' : 'text-white' }} group flex items-center rounded-lg p-2 hover:bg-white hover:text-cyan-100 dark:text-white dark:hover:bg-gray-700"
                        @if (request()->routeIs('admin.news')) aria-current="page" @endif>
                        <span class="ms-3 flex-1 whitespace-nowrap">Banner</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main>
        @yield('admincontent')
    </main>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <!-- Flowbite datatables JS -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('logo-sidebar');
        const hamburgerBtn = document.getElementById('hamburger-btn');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

</body>

</html>
