@extends('layout.headerFooter')

@section('content')

    <!-- Title Start -->
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Alumni</h2>
            </div>
            <!-- Title End -->

            <!-- Search Start -->
            <div>
                <form class="mx-auto flex max-w-sm items-center" onsubmit="searchAlumni(event)">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input
                            type="text"
                            id="simple-search"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search alumni..."
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        class="bg-btn-cyan ms-2 rounded-xl border border-cyan bg-cyan p-2.5 text-sm font-medium text-white hover:bg-cyan-100 focus:outline-none focus:ring-4 focus:ring-cyan"
                    >
                        <svg
                            class="h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
            <!-- Search End -->

            <!-- Filter Start -->
            <!-- Filter diresponsif biar kek paginate-->
            <div class="mb-16 mt-9 flex flex-wrap items-center gap-2">
                <div class="flex flex-wrap gap-1">
                    <button
                        class="rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                        value=""
                        onclick="filterAlumni(event)"
                    >
                        All
                    </button>
                    @foreach (range('A', 'Z') as $letter)
                        <button
                            class="h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                            value="{{ $letter }}"
                            onclick="filterAlumni(event)"
                        >
                            {{ strtolower($letter) }}
                        </button>
                    @endforeach
                </div>
                <div class="ml-0">
                    <form class="max-w-sm">
                        <select
                            id="angkatan"
                            class="block w-full rounded-2xl bg-cyan p-2.5 text-xs text-white"
                            onchange="filterByYear(event)"
                        >
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
            <div id="no-results" class="hidden h-40 items-center justify-center">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg
                        class="h-10 w-10 text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                    <p class="text-center text-gray-900">No Result Found</p>
                </div>
            </div>
            <!-- No Result Found End -->

            <!-- Alumni Start -->
            <div id="alumni-cards" class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($alumnis as $al)
                    <div
                        class="alumni-card w-full max-w-sm rounded-lg border border-gray-200 bg-lightblue shadow-md"
                        data-name="{{ $al->name }}"
                        data-year="{{ $al->graduate_year }}"
                    >
                        <div class="flex flex-col items-center py-10">
                            <div class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                <span class="text-sm">
                                    {{ $al->graduate_year }}
                                </span>
                            </div>
                            <img
                                class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                src="{{ $al->profile_photo }}"
                                alt="{{ $al->name }} image"
                            />
                            <h2 class="mb-1 text-xl text-cyan">
                                {{ $al->name }}
                            </h2>
                            <h3 class="text-lg text-cyan">
                                {{ $al->job_name }}
                            </h3>
                            <h4 class="text-md text-gray-500">
                                {{ $al->company_name }}
                            </h4>
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

            alumniCards.forEach((card) => {
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

            alumniCards.forEach((card) => {
                const name = card.getAttribute('data-name').toUpperCase();
                if (filterValue === '' || name.startsWith(filterValue)) {
                    card.style.display = ''; // Show card
                    visibleCount++; // Increment visible count
                } else {
                    card.style.display = 'none'; // Hide card
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

            alumniCards.forEach((card) => {
                const year = card.getAttribute('data-year');
                if (yearValue === '' || year === yearValue) {
                    card.style.display = ''; // Show card
                    visibleCount++; // Increment visible count
                } else {
                    card.style.display = 'none'; // Hide card
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
