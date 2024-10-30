@extends('layout.headerFooter')

@section('content')

    {{-- Title --}}
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Companies</h2>
            </div>

            {{-- Search --}}
            <div>
                <form class="mx-auto flex max-w-sm items-center" onsubmit="searchCompanies(event)">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input
                            type="text"
                            id="simple-search"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search companies..."
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

            {{-- Filter --}}
            <div class="mb-16 mt-9 flex flex-wrap items-center justify-center gap-2">
                <div class="flex flex-wrap gap-1">
                    <button
                        class="btn-filter rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                        onclick="filterCompanies(event)"
                        value=""
                    >
                        All
                    </button>
                    @foreach (range('A', 'Z') as $letter)
                        <button
                            class="btn-filter h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                            onclick="filterCompanies(event)"
                            value="{{ $letter }}"
                        >
                            {{ strtolower($letter) }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- No Result Found --}}
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

            {{-- Companies Start --}}
            <div id="companies-card" class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($company as $com)
                    <div
                        class="company-card w-full max-w-sm rounded-lg border border-gray-200 bg-lightblue shadow-md"
                        data-name="{{ $com->company_name }}"
                    >
                        <div class="flex flex-col items-center py-10">
                            <img
                                class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                src="{{ $com->company_picture }}"
                                alt="Bonnie image"
                            />
                            <h2 class="mb-1 text-xl text-cyan">
                                {{ $com->company_name }}
                            </h2>
                            <h3 class="mb-1 text-lg text-cyan">
                                {{ $com->company_field }}
                            </h3>
                            <h4 class="text-md text-center text-gray-400">
                                {{ $com->company_address }}
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Companies End --}}

        </div>
    </section>

    <script>
        // Search Functionality
        function searchCompanies(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('simple-search').value.toLowerCase();
            const companyCards = document.querySelectorAll('.company-card');
            let visibleCount = 0;

            companyCards.forEach((card) => {
                const name = card.getAttribute('data-name').toLowerCase();
                if (name.includes(searchTerm)) {
                    card.style.display = ''; // Show card
                    visibleCount++;
                } else {
                    card.style.display = 'none'; // Hide card
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

        // Filter Functionality
        function filterCompanies(event) {
            const filterValue = event.target.value.toUpperCase();
            const companyCards = document.querySelectorAll('.company-card');
            let visibleCount = 0;

            companyCards.forEach((card) => {
                const name = card.getAttribute('data-name').toUpperCase();
                if (filterValue === '' || name.startsWith(filterValue)) {
                    card.style.display = ''; // Show card
                    visibleCount++;
                } else {
                    card.style.display = 'none'; // Hide card
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
    </script>
@endsection
