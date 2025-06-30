@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if (Session::has('success'))
            <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                {!! Session::get('success') !!}
            </div>
        @endif

        <div class="sticky top-20 z-20 w-full bg-white py-4 sm:pb-8 sm:pt-3">
            {{-- New Post Button --}}
            @auth
                @if (Auth::check() && Auth::user()->id_roles == '2')
                    <div class="mx-auto mt-6 flex max-w-screen-xl justify-end px-4 sm:px-6">
                        <button id="new-post-btn" data-modal-target="crud-modal-post" data-modal-toggle="crud-modal-post"
                            class="bg-btn-cyan items-center rounded-xl bg-cyan px-6 py-3 text-sm text-white shadow-md hover:bg-lightblue hover:text-cyan sm:text-base">
                            New Post +
                        </button>
                    </div>
                @endif
            @endauth

            {{-- Filters and Search --}}
            <div class="mx-auto mt-4 max-w-screen-xl items-center justify-between px-4 sm:flex sm:px-6">
                @auth
                    @if (Auth::check() && (Auth::user()->id_roles == '2' || Auth::user()->id_roles == '3'))
                        <div class="mb-2 flex justify-start sm:mb-0 sm:space-x-4 xl:space-x-10">
                            @if (Auth::user()->id_roles == '2')
                                <a href="{{ route('posts', ['filter' => 'my_posts']) }}" id="my-post-button"
                                    class="text-cyan-600 rounded-xl border border-gray-200 px-3 py-2 text-sm hover:bg-gray-200 sm:px-6 sm:py-4 xl:text-base">
                                    My Post
                                </a>
                            @endif
                            <a href="{{ route('posts', ['filter' => 'my_commented_posts']) }}" id="my-commented-post-button"
                                class="text-cyan-600 rounded-xl border border-gray-200 px-3 py-2 text-sm hover:bg-gray-200 sm:px-6 sm:py-4 xl:text-base">
                                My Commented Post
                            </a>
                        </div>
                    @endif
                @endauth
                {{-- Search --}}
                <div class="mb-2 max-w-screen-xl sm:mb-0">
                    <form id="search-form" class="flex max-w-sm items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="query"
                                class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                                placeholder="Search post..." />
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
                {{-- Date Range --}}
                <div class="flex items-center">
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start_date" type="date"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-5 text-cyan">to</span>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-end" name="end_date" type="date"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900"
                            placeholder="Select date end">
                    </div>
                    <button type="button" id="clear-dates"
                        class="ml-2 rounded-lg border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200">
                        Clear
                    </button>
                </div>
            </div>
            {{-- Filters and Search End --}}
        </div>

        {{-- Modal New Post --}}
        <div id="crud-modal-post" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                    <div class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                        <h3 class="text-2xl text-cyan sm:text-start">
                            Post a Job Opportunity!
                        </h3>
                        <button type="button" class="inline-flex items-center" data-modal-toggle="crud-modal-post">
                            <svg class="h-6 w-6 text-cyan" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                        </button>
                    </div>

                    {{-- Modal Create Posts --}}
                    @auth
                        @if (Auth::check() && Auth::user()->id_roles == '2')
                            <form id="vacancy-form"
                                class="scrollbar-modal max-h-96 space-y-8 overflow-y-auto px-4 pb-4 pt-0 md:px-5 md:pb-5"
                                method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-0 grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-2">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="position" class="mb-1 block text-2xl text-cyan">
                                            Position <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <select name="position" id="position" required
                                            class="@error('position') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                            <option value="">Select a job position</option>
                                            @foreach ($allJob as $job)
                                                <option value="{{ $job->job_name }}"
                                                    {{ old('job_name') == $job->job_name ? 'selected' : '' }}>
                                                    {{ $job->job_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="company" class="block text-2xl text-cyan">
                                            Company <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <span class="-mt-1 mb-1 block text-sm text-cyan-100">This feature is only available to
                                            users with experience at a company they have worked for.</span>
                                        <select name="company" id="company"
                                            class="@error('company') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                            required>
                                            <option value="" disabled {{ old('company') ? '' : 'selected' }}>Select a
                                                company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id_company }}"
                                                    {{ old('company') == $company->id_company ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="vacancy_description" class="mb-1 block text-2xl text-cyan">
                                            Description <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <textarea name="vacancy_description" id="vacancy_description"
                                            class="@error('vacancy_description') border-red-500 @else border-gray-300 @enderror w-full rounded-xl border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                            placeholder="Enter content" required>{{ old('vacancy_description') }}</textarea>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="start_date" class="mb-1 block text-2xl text-cyan">
                                            Start Date <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ old('start_date') }}"
                                            class="@error('start_date') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                            required>
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="end_date" class="mb-1 block text-2xl text-cyan">
                                            End Date <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                            class="@error('end_date') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                            required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="responsibility" class="mb-1 block text-2xl text-cyan">Responsibility <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                        <div id="responsibility-container-create">
                                            <div class="responsibility-item mb-2 flex items-center">
                                                <input id="responsibility" type="text" name="vacancy_responsibility[]"
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    placeholder="Enter responsibility" required />
                                                <button type="button"
                                                    class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                    style="display: none;">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-responsibility"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Responsibility
                                        </button>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="qualification" class="mb-1 block text-2xl text-cyan">Qualification <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                        <div id="qualification-container">
                                            <div class="qualification-item mb-2 flex items-center">
                                                <input id="qualification" type="text" name="vacancy_qualification[]"
                                                    required
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    placeholder="Enter qualification" />
                                                <button type="button"
                                                    class="remove-qualification ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                    style="display: none;">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-qualification"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Qualification
                                        </button>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="benefits" class="mb-1 block text-2xl text-cyan">Benefits <span
                                                class="text-4xl text-red-500">*</span></label>
                                        <div id="benefits-container">
                                            <div class="benefits-item mb-2 flex items-center">
                                                <input id="benefit" type="text" name="vacancy_benefits[]" required
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    placeholder="Enter benefits" />
                                                <button type="button"
                                                    class="remove-benefits ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                    style="display: none;">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-benefits"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Benefits
                                        </button>
                                    </div>
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="vacancy_picture" class="mb-1 block text-2xl text-cyan">
                                            Upload Poster <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="file" name="vacancy_picture" id="vacancy_picture" required
                                            class="@error('vacancy_picture') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 file:mr-4 file:rounded-full file:border-0 file:bg-gray-300 file:px-4 file:py-2 file:text-gray-700 hover:file:bg-gray-400"
                                            onchange="checkPosterFile(this)">
                                        <p id="poster-error" class="mt-1 text-sm text-red-500"></p>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" id="submit-vacancy"
                                        class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                        Post
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-0">
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

            {{-- Post Card Container --}}
            <div id="post-container">
                {{-- Posts will be dynamically inserted here by JavaScript --}}
            </div>
            {{-- Post Card End --}}
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Create Post Modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addDynamicInput = (containerId, buttonId, inputName, removeClass) => {
                const container = document.getElementById(containerId);
                const addButton = document.getElementById(buttonId);
                if (!container || !addButton) return;

                addButton.addEventListener('click', () => {
                    const newItem = document.createElement('div');
                    newItem.classList.add(`${inputName.replace(/\[\]$/, '')}-item`, 'mb-2', 'flex',
                        'items-center');
                    newItem.innerHTML = `
                        <input type="text" name="${inputName}" required
                            class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                            placeholder="Add More" />
                        <button type="button" class="ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2 ${removeClass}">Remove</button>
                    `;
                    container.appendChild(newItem);
                });

                container.addEventListener('click', (e) => {
                    if (e.target.classList.contains(removeClass)) {
                        e.target.closest(`.${inputName.replace(/\[\]$/, '')}-item`).remove();
                    }
                });
            };

            addDynamicInput('responsibility-container-create', 'add-responsibility', 'vacancy_responsibility[]',
                'remove-responsibility');
            addDynamicInput('qualification-container', 'add-qualification', 'vacancy_qualification[]',
                'remove-qualification');
            addDynamicInput('benefits-container', 'add-benefits', 'vacancy_benefits[]', 'remove-benefits');
        });

        function checkPosterFile(input) {
            const errorElement = document.getElementById('poster-error');
            const file = input.files[0];
            errorElement.textContent = "";

            if (!file) return;

            const maxSizeMB = 1;
            const maxSizeInBytes = maxSizeMB * 1024 * 1024;
            const allowedTypes = ['image/jpeg', 'image/png'];

            if (file.size > maxSizeInBytes) {
                errorElement.textContent = `File is too large. Maximum allowed size is ${maxSizeMB} MB.`;
                input.value = "";
                return;
            }

            if (!allowedTypes.includes(file.type)) {
                errorElement.textContent = "Invalid file format. Only JPG or PNG images are allowed.";
                input.value = "";
                return;
            }
        }
    </script>

    {{-- Unified Script for Post Filtering, Fetching, and Pagination --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- 1. STATE MANAGEMENT ---
            const urlParams = new URLSearchParams(window.location.search);
            let currentFilter = urlParams.get('filter') || '';
            let currentPage = parseInt(urlParams.get('page')) || 1;
            let currentSearch = urlParams.get('query') || '';
            let currentStartDate = urlParams.get('start_date') || '';
            let currentEndDate = urlParams.get('end_date') || '';

            // --- 2. ELEMENT REFERENCES ---
            const postsContainer = document.getElementById('post-container');
            const searchInput = document.getElementById('simple-search');
            const searchForm = document.getElementById('search-form');
            const startDateInput = document.getElementById('datepicker-range-start');
            const endDateInput = document.getElementById('datepicker-range-end');
            const clearDatesBtn = document.getElementById('clear-dates');
            const filterLinks = document.querySelectorAll('a[href*="filter="]');
            const noResultsDiv = document.getElementById('no-results');

            // --- 3. INITIALIZATION ---
            searchInput.value = currentSearch;
            if (startDateInput) startDateInput.value = currentStartDate;
            if (endDateInput) endDateInput.value = currentEndDate;

            // Initial fetch based on URL params
            fetchAndDisplayPosts();
            updateActiveButtonUI(currentFilter);

            // --- 4. EVENT LISTENERS ---
            filterLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedFilter = new URL(this.href).searchParams.get('filter') || '';
                    currentFilter = (currentFilter === selectedFilter) ? '' : selectedFilter;
                    currentPage = 1;
                    updateUrlAndFetch();
                    updateActiveButtonUI(currentFilter);
                });
            });

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                currentSearch = searchInput.value.trim();
                currentPage = 1;
                updateUrlAndFetch();
            });

            [startDateInput, endDateInput].forEach(input => {
                if (input) {
                    input.addEventListener('change', () => {
                        currentStartDate = startDateInput ? startDateInput.value : '';
                        currentEndDate = endDateInput ? endDateInput.value : '';
                        currentPage = 1;
                        updateUrlAndFetch();
                    });
                }
            });

            // Clear dates functionality
            if (clearDatesBtn) {
                clearDatesBtn.addEventListener('click', () => {
                    if (startDateInput) startDateInput.value = '';
                    if (endDateInput) endDateInput.value = '';
                    currentStartDate = '';
                    currentEndDate = '';
                    currentPage = 1;
                    updateUrlAndFetch();
                });
            }

            document.addEventListener('click', function(e) {
                const paginationLink = e.target.closest('.pagination-container a[data-page]');
                if (paginationLink) {
                    e.preventDefault();
                    const page = parseInt(paginationLink.dataset.page);
                    if (page && page !== currentPage) {
                        currentPage = page;
                        updateUrlAndFetch();
                    }
                }
            });

            // --- 5. CORE FUNCTIONS ---
            function updateUrlAndFetch() {
                const params = new URLSearchParams();
                if (currentFilter) params.append('filter', currentFilter);
                if (currentSearch) params.append('query', currentSearch);
                if (currentPage > 1) params.append('page', currentPage);
                if (currentStartDate) params.append('start_date', currentStartDate);
                if (currentEndDate) params.append('end_date', currentEndDate);

                const newUrl = `${window.location.pathname}?${params.toString()}`;
                history.pushState({
                    path: newUrl
                }, '', newUrl);
                fetchAndDisplayPosts();
            }

            async function fetchAndDisplayPosts() {
                const existingPagination = document.querySelector('.pagination-container');
                if (existingPagination) existingPagination.remove();

                // Clear initial server-rendered pagination if it exists
                const initialPagination = document.querySelector('.flex.justify-center');
                if (initialPagination && initialPagination.querySelector(
                        'nav[aria-label="Pagination Navigation"]')) initialPagination.remove();

                postsContainer.innerHTML = '<p class="py-4 text-center text-gray-500">Loading...</p>';
                noResultsDiv.style.display = 'none';

                const params = new URLSearchParams();
                if (currentFilter) params.append('filter', currentFilter);
                if (currentSearch) params.append('query', currentSearch);
                if (currentPage > 1) params.append('page', currentPage);
                if (currentStartDate) params.append('start_date', currentStartDate);
                if (currentEndDate) params.append('end_date', currentEndDate);

                try {
                    const response = await axios.get(`/api/posts?${params.toString()}`, {
                        withCredentials: true
                    });
                    const paginator = response.data.data;
                    const posts = paginator.data;

                    if (!posts || posts.length === 0) {
                        postsContainer.innerHTML = '';
                        noResultsDiv.style.display = 'flex';
                    } else {
                        postsContainer.innerHTML = posts.map(post => createPostHTML(post)).join('');
                    }

                    if (shouldShowPagination(paginator)) {
                        const paginationHTML = createPaginationHTML(paginator.links, paginator);
                        postsContainer.insertAdjacentHTML('afterend', paginationHTML);
                    }
                } catch (error) {
                    console.error('Error fetching posts:', error);
                    postsContainer.innerHTML =
                        '<p class="py-4 text-center text-red-500">Failed to load vacancies.</p>';
                }
            }

            function createPostHTML(post) {
                const dateDiffText = formatDateDifference(post.created_at);
                const profilePhoto = post.profile_photo || 'default_profile.png';
                return `
                    <a href="/posts/detail/${post.id_vacancy}" class="post-card block">
                        <div class="mt-3 grid space-y-4 lg:grid-cols-1">
                            <article class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-[0px_2px_3px_0px_rgba(0,0,0,0.30)]">
                                <div class="mb-5 flex items-center justify-between text-gray-400">
                                    <span class="ml-auto text-xs sm:text-sm">${dateDiffText}</span>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:space-x-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-20 w-20 rounded-full object-cover" src="/storage/profile/${profilePhoto}" alt="${post.name}" />
                                    </div>
                                    <div class="mt-4 lg:mt-0">
                                        <h2 class="post-title mb-2 text-xl tracking-tight text-cyan sm:text-2xl">${post.position}</h2>
                                        <h2 class="post-company mb-2 text-base tracking-tight text-cyan sm:text-xl">${post.company_name}</h2>
                                        <p class="post-author text-sm text-gray-400 sm:text-lg">Posted by ${post.name}</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </a>`;
            }

            function shouldShowPagination(paginator) {
                return paginator && paginator.total > paginator.per_page;
            }

            function createPaginationHTML(links, meta) {
                const paginationLinks = links.map(link => {
                    const page = link.url ? new URL(link.url).searchParams.get('page') : null;
                    let label = link.label.replace('&laquo;', '‹').replace('&raquo;', '›');
                    if (label.includes('Previous')) label = '‹ Previous';
                    if (label.includes('Next')) label = 'Next ›';

                    let classes = 'mx-1 px-3 py-2 text-sm rounded-lg border transition-colors duration-200';
                    if (link.active) {
                        classes += ' bg-cyan text-white border-cyan cursor-default';
                    } else if (!link.url) {
                        classes += ' bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed';
                    } else {
                        classes += ' bg-white text-gray-700 border-gray-300 hover:bg-gray-100';
                    }
                    return `<a href="#" data-page="${page}" class="${classes}">${label}</a>`;
                }).join('');

                return `
                    <div class="pagination-container mt-8 flex flex-col items-center space-y-2">
                        <div class="flex items-center space-x-1">
                            ${paginationLinks}
                        </div>
                        <div class="text-sm text-gray-600">
                            Showing ${meta.from || 0} to ${meta.to || 0} of ${meta.total} results
                        </div>
                    </div>`;
            }

            function updateActiveButtonUI(activeFilter) {
                filterLinks.forEach(link => {
                    const filter = new URL(link.href).searchParams.get('filter') || '';
                    link.classList.toggle('bg-cyan-100', filter === activeFilter);
                    link.classList.toggle('text-white', filter === activeFilter);
                    link.classList.toggle('text-cyan-600', filter !== activeFilter);
                    link.classList.toggle('hover:bg-gray-200', filter !== activeFilter);
                });
            }

            function formatDateDifference(dateString) {
                const postDate = new Date(dateString);
                const now = new Date();
                const diffTime = Math.abs(now - postDate);
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays === 0) return 'Today';
                if (diffDays === 1) return '1 day ago';
                return `${diffDays} days ago`;
            }
        });
    </script>
@endsection
