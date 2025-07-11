@extends('layout.headerFooter')

@section('content')
    {{-- Title --}}
    <section class="mt-20 bg-white">
        <div class="sticky top-20 z-20 w-full bg-white px-2 pb-2 pt-16 sm:px-16">
            {{-- Title --}}
            {{-- <div class="mx-auto mb-8 max-w-screen-sm text-center">
                <h2 class="text-3xl text-cyan lg:text-4xl">Alumni</h2>
            </div> --}}

            {{-- Search --}}
            <div>
                <form class="mx-auto flex max-w-sm items-center" onsubmit="searchAlumni(event)">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search alumni..." required />
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

            <div class="max-w-screen-xl sm:mx-auto sm:px-4 lg:px-6">
                {{-- Filter --}}
                <div class="mt-9 flex flex-wrap items-center gap-2">
                    <div class="flex w-full justify-around gap-1 overflow-x-auto">
                        <button
                            class="rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                            value="" onclick="filterAlumni(event)">
                            All
                        </button>
                        @foreach (range('A', 'Z') as $letter)
                            <button
                                class="h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                                value="{{ strtolower($letter) }}" onclick="filterAlumni(event)">
                                {{ strtolower($letter) }}
                            </button>
                        @endforeach
                    </div>
                    {{-- Dropdown for years --}}
                    <div class="ml-0">
                        <form class="max-w-sm">
                            <select id="angkatan" class="block w-full rounded-2xl bg-cyan text-xs text-white"
                                onchange="filterByYear(event)">
                                <option value="" selected>All Years</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </form>
                    </div>

                    {{-- Paginated alphabet filter for mobile view --}}
                    {{-- <div id="alphabet-filter" class="flex w-full flex-row gap-1 sm:hidden">
                        <button
                            class="rounded-full bg-cyan px-4 py-1 text-center text-sm text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100"
                            value="" onclick="filterAlumni(event)">
                            All
                        </button>
                    </div> --}}

                </div>
            </div>

            {{-- Pagination controls for mobile view only --}}
            {{-- <div class="mt-4 flex justify-center sm:hidden">
                <button id="prev-btn"
                    class="rounded-md bg-cyan-100 px-3 py-1 text-white hover:bg-white hover:text-cyan-100 disabled:opacity-50"
                    onclick="prevPage()" disabled>
                    Prev
                </button>
                <button id="next-btn"
                    class="ml-2 rounded-md bg-cyan-100 px-3 py-1 text-white hover:bg-white hover:text-cyan-100 disabled:opacity-50"
                    onclick="nextPage()">
                    Next
                </button>
            </div> --}}

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
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-4 lg:px-6 lg:py-8">
            {{-- Alumni Cards Start --}}
            <div id="alumni-cards" class="grid justify-items-center gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                {{-- @foreach ($alumnis as $al)
                    <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                        href="{{ route('alumni.detail', ['id' => $al->id_userDetails]) }}" data-name="{{ $al->name }}"
                        data-year="{{ $al->entry_year }}">
                        <div class="flex flex-col items-center px-8 py-8 text-center">
                            <div class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                <span class="text-sm">
                                    {{ $al->graduate_year }}
                                </span>
                            </div>
                            <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                src="{{ asset('storage/profile/' . $al->profile_photo) }}"
                                alt="{{ $al->name }} image" />
                            <h2 class="mb-1 text-2xl text-cyan">
                                {{ $al->name }}
                            </h2>
                            <h3 class="text-base text-cyan">
                                {{ $al->job_name }}
                            </h3>
                            <h4 class="text-sm text-gray-500">
                                {{ $al->company_name }}
                            </h4>
                        </div>
                    </a>
                @endforeach --}}
            </div>
            {{-- Alumni Cards End --}}
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Alumni API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to fetch and display all alumni (including those without complete details)
            async function fetchAndDisplayAlumni() {
                try {
                    const response = await axios.get('/api/users/alumni', {
                        withCredentials: true
                    });

                    const alumniContainer = document.getElementById('alumni-cards');
                    const allAlumni = response.data.data;

                    if (!allAlumni || allAlumni.length === 0) {
                        alumniContainer.innerHTML = '<p class="text-center py-4">No alumni available</p>';
                        return;
                    }

                    let alumniHTML = '';
                    allAlumni.forEach(alumni => {
                        // Safely access nested properties with fallbacks
                        const userDetails = alumni.user_details || {};

                        alumniHTML += `
                            <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                                href="/alumni/detail/${userDetails.id_userDetails || ''}"
                                data-name="${userDetails.name || 'No name'}"
                                data-year="${userDetails.entry_year || ''}">
                                <div class="flex flex-col items-center px-8 py-8 text-center">
                                    <div class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                        <span class="text-sm">
                                            ${userDetails.graduate_year || 'Graduated'}
                                        </span>
                                    </div>
                                    <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                        src="/storage/profile/${userDetails.profile_photo || 'default_profile.png'}"
                                        alt="${userDetails.name || 'Alumni'} image" />
                                    <h2 class="mb-1 text-2xl text-cyan">
                                        ${userDetails.name || 'Anonymous Alumni'}
                                    </h2>
                                    <h3 class="text-base text-cyan">
                                        ${userDetails.current_job || 'Job not specified'}
                                    </h3>
                                    <h4 class="text-sm text-gray-500">
                                        ${userDetails.current_company || 'Company not specified'}
                                    </h4>
                                </div>
                            </a>
                        `;
                    });

                    alumniContainer.innerHTML = alumniHTML;
                } catch (error) {
                    console.error('Error:', error);
                    document.getElementById('alumni-cards').innerHTML =
                        '<p class="text-center py-4 text-red-500">Error loading alumni. Please try again later.</p>';
                }
            }

            // Initial fetch
            fetchAndDisplayAlumni();
        });
    </script>

    {{-- Filter Alumni --}}
    <script>
        let selectedLetter = ''; // Variable to store selected letter

        function searchAlumni(event) {
            event.preventDefault();
            const searchTerm = getSearchTerm();
            applyFilters(searchTerm, getSelectedYear(), selectedLetter); // Use selectedLetter here
        }

        function filterAlumni(event) {
            selectedLetter = event.target.value.toLowerCase(); // Update selected letter
            applyFilters(getSearchTerm(), getSelectedYear(), selectedLetter); // Use selectedLetter here
        }

        function filterByYear(event) {
            const selectedYear = getSelectedYear();
            applyFilters(getSearchTerm(), selectedYear, selectedLetter); // Use selectedLetter here
        }

        function applyFilters(searchTerm, year, letter) {
            const alumniCards = document.querySelectorAll('.alumni-card');
            let visibleCount = 0;

            alumniCards.forEach((card) => {
                const name = card.getAttribute('data-name').toLowerCase();
                const cardYear = card.getAttribute('data-year');
                const nameStartsWithLetter = letter === '' || name.startsWith(letter);
                const yearMatches = year === '' || cardYear === year;
                const nameMatchesSearch = searchTerm === '' || name.includes(searchTerm);

                if (nameStartsWithLetter && yearMatches && nameMatchesSearch) {
                    card.style.display = ''; // Show card if it matches all filters
                    visibleCount++;
                } else {
                    card.style.display = 'none'; // Hide card if it doesn't match
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

        function getSearchTerm() {
            return document.getElementById('simple-search').value.toLowerCase();
        }

        function getSelectedYear() {
            return document.getElementById('angkatan').value;
        }

        function getSelectedLetter() {
            return selectedLetter;
        }

        // Keep the mobile pagination for alphabet as in the previous version
        const letters = [...Array(26)].map((_, i) => String.fromCharCode(i + 65).toLowerCase());
        const itemsPerPage = 6; // Show 6 letters per page on mobile
        let currentPage = 0;

        function renderAlphabetButtons() {
            const alphabetFilter = document.getElementById('alphabet-filter');
            alphabetFilter.innerHTML = ''; // Clear previous buttons

            // Keep the "All" button static
            const allButton = document.createElement('button');
            allButton.className =
                'h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100';
            allButton.textContent = 'All';
            allButton.value = '';
            allButton.onclick = filterAlumni;
            alphabetFilter.appendChild(allButton); // Always append the "All" button first

            // Calculate start and end index for current page
            const start = currentPage * itemsPerPage;
            const end = Math.min(start + itemsPerPage, letters.length);

            // Generate buttons for the current page
            for (let i = start; i < end; i++) {
                const letter = letters[i];
                const button = document.createElement('button');
                button.className =
                    'h-6 w-10 rounded-full bg-cyan px-4 py-1 text-center text-xs text-white hover:bg-cyan-100 hover:text-white focus:bg-cyan-100 focus:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100';
                button.textContent = letter;
                button.value = letter;
                button.onclick = filterAlumni;
                alphabetFilter.appendChild(button);
            }

            // Handle disabling of pagination buttons
            document.getElementById('prev-btn').disabled = currentPage === 0;
            document.getElementById('next-btn').disabled = end >= letters.length;
        }

        function nextPage() {
            currentPage++;
            renderAlphabetButtons();
        }

        function prevPage() {
            currentPage--;
            renderAlphabetButtons();
        }

        // Initial render for mobile view
        renderAlphabetButtons();
    </script>
@endsection
