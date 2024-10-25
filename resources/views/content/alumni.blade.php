@extends('layout.headerFooter')

@section('content')
    <!-- Title Start -->
    <section class="bg-white mt-20">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Alumni</h2>
            </div>
            <!-- Title End -->

            <!-- Search Start -->
            <div>
                <form class="flex items-center max-w-sm mx-auto" onsubmit="searchAlumni(event)">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-gray-200 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-cyan focus:border-cyan block w-full ps-10 p-2.5"
                            placeholder="Search alumni..." required>
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-cyan bg-btn-cyan rounded-xl border border-cyan hover:bg-cyan-100 focus:ring-4 focus:outline-none focus:ring-cyan">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
            <!-- Search End -->

            <!-- Filter Start -->
            <div class="flex flex-wrap gap-2 mt-9 mb-16 items-center">
                <div class="flex flex-wrap gap-1">
                    <button
                        class="text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-sm px-4 py-1 text-center"
                        value="" onclick="filterAlumni(event)">All</button>
                    @foreach (range('A', 'Z') as $letter)
                        <button
                            class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                            value="{{ $letter }}" onclick="filterAlumni(event)"> {{ strtolower($letter) }}
                        </button>
                    @endforeach
                </div>
                <div class="ml-0">
                    <form class="max-w-sm">
                        <select id="angkatan" class="bg-cyan text-white text-xs rounded-2xl block w-full p-2.5"
                            onchange="filterByYear(event)">
                            <option value="" selected>All Years</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </form>
                </div>
            </div>
            <!-- Filter End -->

            <!-- No Result Found Start -->
            <div id="no-results" class="hidden justify-center items-center h-40"> <!-- Removed 'flex' but kept 'hidden' -->
                <div class="flex flex-col justify-center items-center space-y-2">
                    <svg class="w-10 h-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <p class="text-center text-gray-900">No Result Found</p>
                </div>
            </div>
            <!-- No Result Found End -->

            <!-- Alumni Start -->
            <div id="alumni-cards" class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                @foreach ($alumnis as $al)
                    <div class="alumni-card w-full max-w-sm bg-lightblue border border-gray-200 rounded-lg shadow-md"
                        data-name="{{ $al->name }}" data-year="{{ $al->graduate_year }}">
                        <div class="flex flex-col items-center py-10">
                            <div class="w-full flex justify-end mb-5 text-gray-400 px-6">
                                <span class="text-sm">{{ $al->graduate_year }}</span>
                            </div>
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $al->profile_photo }}"
                                alt="{{ $al->name }} image" />
                            <h2 class="mb-1 text-xl text-cyan">{{ $al->name }}</h2>
                            <h3 class="text-lg text-cyan">{{ $al->job_name }}</h3>
                            <h4 class="text-md text-gray-500">{{ $al->company_name }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Alumni End -->

        </div>
    </section>

    <script>
        function searchAlumni(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('simple-search').value.toLowerCase();
            const alumniCards = document.querySelectorAll('.alumni-card');
            let visibleCount = 0;

            alumniCards.forEach(card => {
                const name = card.getAttribute('data-name').toLowerCase();
                if (name.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noResults = document.getElementById('no-results');
            if (visibleCount === 0) {
                noResults.classList.remove('hidden'); // Show message
                noResults.classList.add('flex'); // Add flex to center
            } else {
                noResults.classList.add('hidden'); // Hide message
                noResults.classList.remove('flex'); // Remove flex to avoid conflict
            }
        }

        function filterAlumni(event) {
            const filterValue = event.target.value.toUpperCase();
            const alumniCards = document.querySelectorAll('.alumni-card');
            let visibleCount = 0; // Track how many cards are visible

            alumniCards.forEach(card => {
                const name = card.getAttribute('data-name').toUpperCase();
                if (filterValue === "" || name.startsWith(filterValue)) {
                    card.style.display = ""; // Show card
                    visibleCount++; // Increment visible count
                } else {
                    card.style.display = "none"; // Hide card
                }
            });

            // Show or hide "No Result Found" message
            const noResults = document.getElementById('no-results');
            if (visibleCount === 0) {
                noResults.style.display = 'flex'; // Show message
            } else {
                noResults.style.display = 'none'; // Hide message
            }
        }

        function filterByYear(event) {
            const yearValue = event.target.value;
            const alumniCards = document.querySelectorAll('.alumni-card');
            let visibleCount = 0; // Track how many cards are visible

            alumniCards.forEach(card => {
                const year = card.getAttribute('data-year');
                if (yearValue === "" || year === yearValue) {
                    card.style.display = ""; // Show card
                    visibleCount++; // Increment visible count
                } else {
                    card.style.display = "none"; // Hide card
                }
            });

            // Show or hide "No Result Found" message
            const noResults = document.getElementById('no-results');
            if (visibleCount === 0) {
                noResults.style.display = 'flex'; // Show message
            } else {
                noResults.style.display = 'none'; // Hide message
            }
        }
    </script>
@endsection
