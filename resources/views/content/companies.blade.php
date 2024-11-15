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
                        <input type="text" id="simple-search"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search companies..." required />
                    </div>
                    <button type="submit"
                        class="bg-btn-cyan ms-2 rounded-xl border border-cyan bg-cyan p-2.5 text-sm font-medium text-white hover:bg-cyan-100 focus:outline-none focus:ring-4 focus:ring-cyan">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>

            {{-- Filter --}}
            <div class="mb-16 mt-9 flex flex-wrap items-center gap-2">
                <div class="hidden w-full flex-wrap gap-1 sm:flex sm:w-auto">
                    <button
                        class="rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                        value="" onclick="filterCompanies(event)">
                        All
                    </button>
                    @foreach (range('A', 'Z') as $letter)
                        <button
                            class="h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                            value="{{ strtolower($letter) }}" onclick="filterCompanies(event)">
                            {{ strtolower($letter) }}
                        </button>
                    @endforeach
                </div>

                {{-- Paginated alphabet filter for mobile view --}}
                <div id="company-alphabet-filter" class="flex w-full flex-wrap gap-2 sm:hidden">
                    <button
                        class="rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                        value="" onclick="filterCompanies(event)">
                        All
                    </button>
                </div>

                {{-- Pagination controls for mobile view only --}}
                <div class="mt-4 flex w-full justify-center sm:hidden">
                    <div class="flex items-center space-x-2">
                        <button id="prev-company-btn"
                            class="rounded-md bg-cyan-100 px-3 py-1 text-white hover:bg-white hover:text-cyan-100 disabled:opacity-50"
                            onclick="prevCompanyPage()" disabled>
                            Prev
                        </button>
                        <button id="next-company-btn"
                            class="rounded-md bg-cyan-100 px-3 py-1 text-white hover:bg-white hover:text-cyan-100 disabled:opacity-50"
                            onclick="nextCompanyPage()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            {{-- No Result Found --}}
            <div id="no-results" class="hidden h-40 items-center justify-center">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <svg class="h-10 w-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <p class="text-center text-gray-900">No Result Found</p>
                </div>
            </div>

            {{-- Companies Cards Start --}}
            <div id="companies-card" class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($company as $com)
                    <a href="{{ route('companies.detail', ['id' => $com->id_company]) }}"
                        class="company-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                        data-name="{{ strtolower($com->company_name) }}">
                        <div {{-- data-aos="fade-up" --}}>
                            <div class="flex flex-col items-center px-8 py-8 text-center">
                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src="{{ $com->company_picture }}"
                                    alt="Bonnie image" />
                                <h2 class="mb-1 text-xl text-cyan">
                                    {{ $com->company_name }}
                                </h2>
                                <h3 class="mb-1 text-lg text-cyan">
                                    {{ $com->company_field }}
                                </h3>
                                <h4 class="text-md text-gray-400">
                                    {{ $com->company_address }}
                                </h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {{-- Companies Cards End --}}
        </div>
    </section>

    <script>
        const companyLetters = [...Array(26)].map((_, i) => String.fromCharCode(i + 65).toLowerCase());
        const companyItemsPerPage = 6; // Show 6 letters per page on mobile
        let currentCompanyPage = 0;

        function filterCompanies(event) {
            const selectedLetter = event.target.value.toLowerCase();
            applyCompanyFilters(selectedLetter);
        }

        function applyCompanyFilters(letter) {
            const companyCards = document.querySelectorAll('.company-card'); // Selecting all company cards
            let visibleCount = 0;

            companyCards.forEach((card) => {
                const companyName = card.getAttribute('data-name').toLowerCase(); // Correct data-name attribute
                const nameStartsWithLetter = letter === '' || companyName.startsWith(letter);

                if (nameStartsWithLetter) {
                    card.style.display = ''; // Show card if it matches the filter
                    visibleCount++;
                } else {
                    card.style.display = 'none'; // Hide card if it doesn't match
                }
            });

            // Show or hide "No Result Found" message if no companies match the filter
            const noResults = document.getElementById('no-results');
            noResults.style.display = visibleCount === 0 ? 'flex' : 'none'; // Display no-results if nothing matches
        }

        function searchCompanies(event) {
            event.preventDefault();
            const query = document.getElementById('simple-search').value.toLowerCase();
            const companyCards = document.querySelectorAll('.company-card');
            let visibleCount = 0;

            companyCards.forEach(card => {
                const companyName = card.getAttribute('data-name').toLowerCase();
                if (companyName.includes(query)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noResults = document.getElementById('no-results');
            noResults.style.display = visibleCount === 0 ? 'flex' : 'none';
        }

        // Pagination logic for mobile view (6 letters per page)
        function renderCompanyAlphabetButtons() {
            const companyAlphabetFilter = document.getElementById('company-alphabet-filter');
            companyAlphabetFilter.innerHTML = ''; // Clear previous buttons

            // Keep the "All" button static
            const allButton = document.createElement('button');
            allButton.className =
                'h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100';
            allButton.textContent = 'All';
            allButton.value = '';
            allButton.onclick = filterCompanies;
            companyAlphabetFilter.appendChild(allButton); // Always append the "All" button first

            // Calculate the start and end index of the current page
            const start = currentCompanyPage * companyItemsPerPage;
            const end = start + companyItemsPerPage;
            const currentPageLetters = companyLetters.slice(start, end);

            currentPageLetters.forEach((letter) => {
                const button = document.createElement('button');
                button.className =
                    'h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100';
                button.textContent = letter;
                button.value = letter;
                button.onclick = filterCompanies;
                companyAlphabetFilter.appendChild(button);
            });

            // Enable/disable pagination buttons based on page limits
            document.getElementById('prev-company-btn').disabled = currentCompanyPage === 0;
            document.getElementById('next-company-btn').disabled =
                currentCompanyPage === Math.ceil(companyLetters.length / companyItemsPerPage) - 1;
        }

        function prevCompanyPage() {
            if (currentCompanyPage > 0) {
                currentCompanyPage--;
                renderCompanyAlphabetButtons();
            }
        }

        function nextCompanyPage() {
            if (currentCompanyPage < Math.ceil(companyLetters.length / companyItemsPerPage) - 1) {
                currentCompanyPage++;
                renderCompanyAlphabetButtons();
            }
        }

        // Initialize alphabet buttons for mobile view
        renderCompanyAlphabetButtons();

        function navigateToDetailCompanies() {
            window.location.href = '{{ route('detailcompanies') }}';
        }
    </script>
@endsection
