@extends('layout.headerFooter')

@section('content')
    {{-- Title --}}
    <section class="mt-20 bg-white">
        <div class="sticky top-20 z-20 w-full bg-white px-2 pb-2 pt-16 sm:px-16">
            {{-- Title --}}
            {{-- <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Companies</h2>
            </div> --}}

            {{-- Search --}}
            <div>
                <form class="mx-auto flex max-w-sm items-center" onsubmit="searchCompanies(event)">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search companies..." oninput="handleSearchInput()" />
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
            <div class="mt-9 flex items-center justify-center gap-2 sm:mx-10 sm:mb-0 sm:px-5">
                <div class="flex w-full justify-center gap-1 overflow-x-auto">
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
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-4 lg:px-6 lg:py-8">
            {{-- Companies Cards Start --}}
            <div id="companies-card" class="grid justify-items-center gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

            </div>
            <div id="pagination-controls" class="mt-6 flex items-center justify-center gap-4"></div>
            {{-- Companies Cards End --}}
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Company API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentPage = 1;
            let currentSearchQuery = '';
            let currentFilterLetter = '';
            let allCompanies = []; // Store all companies for client-side filtering
            const companiesContainer = document.getElementById('companies-card');
            const paginationControls = document.getElementById('pagination-controls');

            async function fetchAllCompanies() {
                try {
                    let page = 1;
                    let allData = [];
                    let hasMorePages = true;

                    while (hasMorePages) {
                        const response = await axios.get(`/api/companies?page=${page}`, {
                            withCredentials: true
                        });

                        const companies = response.data.data;
                        const meta = response.data.meta;

                        if (companies && companies.length > 0) {
                            allData = allData.concat(companies);
                            page++;
                            hasMorePages = page <= meta.last_page;
                        } else {
                            hasMorePages = false;
                        }
                    }

                    allCompanies = allData;
                    displayFilteredCompanies();
                } catch (error) {
                    console.error('Error fetching companies:', error);
                    companiesContainer.innerHTML =
                        '<p class="text-center py-4 text-red-500">Error loading companies. Please try again later.</p>';
                    paginationControls.innerHTML = '';
                }
            }

            function displayFilteredCompanies(page = 1) {
                let filteredCompanies = allCompanies;

                // Apply search filter
                if (currentSearchQuery) {
                    filteredCompanies = filteredCompanies.filter(company =>
                        company.company_name.toLowerCase().includes(currentSearchQuery.toLowerCase())
                    );
                }

                // Apply letter filter
                if (currentFilterLetter) {
                    filteredCompanies = filteredCompanies.filter(company =>
                        company.company_name.toLowerCase().startsWith(currentFilterLetter.toLowerCase())
                    );
                }

                // Check if no results
                const noResults = document.getElementById('no-results');
                if (filteredCompanies.length === 0) {
                    companiesContainer.innerHTML = '';
                    paginationControls.innerHTML = '';
                    noResults.style.display = 'flex';
                    return;
                } else {
                    noResults.style.display = 'none';
                }

                // Pagination logic
                const itemsPerPage = 15;
                const totalItems = filteredCompanies.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const currentPageData = filteredCompanies.slice(startIndex, endIndex);

                // Display companies
                let companiesHTML = '';
                currentPageData.forEach(company => {
                    let companyPicture = company.company_picture;

                    if (!companyPicture ||
                        companyPicture ===
                        'https://picsum.photos/id/870/200/300?grayscale&blur=2' ||
                        companyPicture === 'default_company.png') {
                        companyPicture = '/storage/company/default_company.png';
                    } else if (!companyPicture.startsWith('http') && !companyPicture.startsWith(
                            '/storage')) {
                        companyPicture = `/storage/company/${companyPicture}`;
                    }

                    companiesHTML += `
                    <a href="/companies/detail/${company.id_company}"
                        class="company-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                        data-name="${company.company_name.toLowerCase()}">
                        <div>
                            <div class="flex flex-col items-center px-8 py-8 text-center">
                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                    src="${companyPicture}"
                                    alt="${company.company_name}"
                                    onerror="this.onerror=null;this.src='/storage/company/default_company.png'" />
                                <h2 class="mb-1 text-2xl text-cyan">${company.company_name || 'Unnamed Company'}</h2>
                                <h3 class="mb-1 text-base text-cyan">${company.company_field || 'Field not specified'}</h3>
                                <h4 class="text-sm text-gray-400">${company.company_address || 'Address not available'}</h4>
                            </div>
                        </div>
                    </a>
                `;
                });

                companiesContainer.innerHTML = companiesHTML;

                // Generate pagination
                if (totalPages > 1) {
                    let paginationHTML = `
    <div class="pagination-container mt-8 flex flex-col items-center space-y-2">
        <div class="flex items-center flex-wrap justify-center space-x-1">
            <a href="#"
               class="mx-1 px-3 py-2 text-sm rounded-lg border transition-colors duration-200
                      ${page === 1 ? 'bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'}"
               ${page === 1 ? 'aria-disabled="true"' : ''}
               onclick="changePage(${page - 1})">
                ‹ Previous
            </a>`;

                    for (let i = 1; i <= totalPages; i++) {
                        paginationHTML += `
        <a href="#"
           class="mx-1 px-3 py-2 text-sm rounded-lg border transition-colors duration-200
                  ${page === i ? 'bg-cyan text-white border-cyan cursor-default' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'}"
           onclick="changePage(${i})">
            ${i}
        </a>`;
                    }

                    paginationHTML += `
            <a href="#"
               class="mx-1 px-3 py-2 text-sm rounded-lg border transition-colors duration-200
                      ${page === totalPages ? 'bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100'}"
               ${page === totalPages ? 'aria-disabled="true"' : ''}
               onclick="changePage(${page + 1})">
                Next ›
            </a>
        </div>
        <div class="text-sm text-gray-600">
            Showing ${startIndex + 1} to ${Math.min(endIndex, totalItems)} of ${totalItems} results
        </div>
    </div>`;

                    paginationControls.innerHTML = paginationHTML;
                } else {
                    paginationControls.innerHTML = '';
                }
            }

            window.changePage = function(page) {
                if (page < 1) return;
                currentPage = page;
                displayFilteredCompanies(page);
            }

            window.filterCompanies = function(event) {
                currentFilterLetter = event.target.value.toLowerCase();
                currentPage = 1;
                
                // If "All" button is clicked, also reset search
                if (currentFilterLetter === '') {
                    currentSearchQuery = '';
                    document.getElementById('simple-search').value = '';
                }
                
                displayFilteredCompanies(1);

                // Update button states - reset all filter buttons to default style
                const filterContainer = event.target.parentElement;
                const allFilterButtons = filterContainer.querySelectorAll('button');

                allFilterButtons.forEach(btn => {
                    btn.classList.remove('bg-cyan-100');
                    btn.classList.add('bg-cyan');
                });

                // Set active style for clicked button
                event.target.classList.remove('bg-cyan');
                event.target.classList.add('bg-cyan-100');
            }

            window.searchCompanies = function(event) {
                event.preventDefault();
                const searchValue = document.getElementById('simple-search').value.trim();
                currentSearchQuery = searchValue;
                currentPage = 1;
                
                // If search is cleared, also reset filter to "All"
                if (searchValue === '') {
                    currentFilterLetter = '';
                    // Reset all filter buttons and set "All" as active
                    const filterContainer = document.querySelector('.flex.w-full.justify-center.gap-1.overflow-x-auto');
                    const allFilterButtons = filterContainer.querySelectorAll('button');
                    allFilterButtons.forEach(btn => {
                        btn.classList.remove('bg-cyan-100');
                        btn.classList.add('bg-cyan');
                    });
                    // Set "All" button as active (first button)
                    allFilterButtons[0].classList.remove('bg-cyan');
                    allFilterButtons[0].classList.add('bg-cyan-100');
                }
                
                displayFilteredCompanies(1);
            }

            window.handleSearchInput = function() {
                const searchValue = document.getElementById('simple-search').value.trim();
                
                // If input is empty, automatically reset search and filter
                if (searchValue === '') {
                    currentSearchQuery = '';
                    currentFilterLetter = '';
                    currentPage = 1;
                    
                    // Reset filter buttons to show "All" as active
                    const filterContainer = document.querySelector('.flex.w-full.justify-center.gap-1.overflow-x-auto');
                    const allFilterButtons = filterContainer.querySelectorAll('button');
                    allFilterButtons.forEach(btn => {
                        btn.classList.remove('bg-cyan-100');
                        btn.classList.add('bg-cyan');
                    });
                    // Set "All" button as active (first button)
                    allFilterButtons[0].classList.remove('bg-cyan');
                    allFilterButtons[0].classList.add('bg-cyan-100');
                    
                    displayFilteredCompanies(1);
                }
            }

            // Initialize
            fetchAllCompanies();
        });
    </script>

    {{-- Filter Companies --}}
    <script>
        // Remove the old filter script since all filtering is now handled in the main script above
        function navigateToDetailCompanies() {
            window.location.href = '{{ route('detailcompanies') }}';
        }
    </script>
@endsection
