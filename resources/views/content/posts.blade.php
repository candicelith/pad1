@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if (Session::has('success'))
            <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                {!! Session::get('success') !!}
            </div>
        @endif

        <div class="sticky top-20 z-20 w-full bg-white pb-8 pt-2">
            {{-- Title --}}
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-9">
                <h2 class="mb-4 text-5xl text-cyan">Posts</h2>
            </div>

            @auth
                @if (Auth::check() && Auth::user()->id_roles == '2')
                    {{-- New Post Button --}}
                    <div class="mx-auto mt-6 flex max-w-screen-xl justify-end px-4 sm:px-6">
                        <a href="{{ route('posts.create') }}"
                            class="items-center rounded-xl bg-cyan px-6 py-3 text-sm text-white shadow-md hover:bg-white hover:text-cyan-100 sm:text-lg">
                            New Post +
                        </a>
                    </div>
                @endif
            @endauth

            {{-- Search --}}
            <div>
                <form id="search-form" class="mx-auto flex max-w-sm items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search" name="query"
                            class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                            placeholder="Search post..." onkeyup="filterPosts()" />
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

            {{-- Filters --}}
            <div class="mx-auto mt-6 max-w-screen-xl justify-between px-4 sm:flex sm:px-6">
                <div class="mb-2 flex space-x-10 sm:mb-0">
                    <button
                        class="text-cyan-600 rounded-xl border border-gray-200 px-3 py-2 hover:bg-gray-200 focus:bg-cyan-100 focus:text-white sm:px-6 sm:py-4">
                        My Post
                    </button>
                    <button
                        class="text-cyan-600 rounded-xl border border-gray-200 px-3 py-2 hover:bg-gray-200 focus:bg-cyan-100 focus:text-white sm:px-6 sm:py-4">
                        My Commented Post
                    </button>
                </div>
                <div id="date-range-picker" date-rangepicker datepicker datepicker-buttons datepicker-autoselect-today
                    class="flex items-center">
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start" type="text"
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
                        <input id="datepicker-range-end" name="end" type="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900"
                            placeholder="Select date end">
                    </div>
                </div>
            </div>
        </div>

        {{-- No Result Found --}}
        <div id="no-results" class="hidden h-40 items-center justify-center">
            <div class="flex flex-col items-center justify-center space-y-2">
                <svg class="h-10 w-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <p class="text-center text-gray-900">No Result Found</p>
            </div>
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-0">
            {{-- Post Card Start --}}
            <div id="post-container">
                @foreach ($vacancys as $vc)
                    <a href="{{ route('posts.detail', ['id' => (string) $vc->id_vacancy]) }}" class="post-card">
                        <div data-aos="fade-up" class="mt-3 grid space-y-4 lg:grid-cols-1">
                            <article
                                class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-[0px_2px_3px_0px_rgba(0,0,0,0.30)]"
                                onclick="navigateToDetailPost()">
                                <div class="mb-5 flex items-center justify-between text-gray-400">
                                    <span class="ml-auto text-xs sm:text-sm">
                                        {{ $vc->date_difference }}
                                    </span>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:space-x-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-20 w-20 rounded-full object-cover"
                                            src="{{ asset('storage/profile/' . $vc->profile_photo) }}"
                                            alt="{{ $vc->name }}" />
                                    </div>
                                    <div class="mt-4 lg:mt-0">
                                        {{-- Position --}}
                                        <h2 class="post-title mb-2 text-xl tracking-tight text-cyan sm:text-2xl">
                                            {{ $vc->position }}
                                        </h2>
                                        {{-- Company Name --}}
                                        <h2 class="post-company mb-2 text-base tracking-tight text-cyan sm:text-xl">
                                            {{ $vc->company_name }}
                                        </h2>
                                        {{-- Posted By "Name" --}}
                                        <p class="post-author text-sm text-gray-400 sm:text-lg">Posted by
                                            {{ $vc->name }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Post Card End --}}

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $vacancys->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>

    <script>
        function filterPosts() {
            let input = document.getElementById('simple-search').value.toLowerCase();
            let posts = document.querySelectorAll('.post-card');
            let noResults = document.getElementById('no-results');
            let hasResults = false;

            posts.forEach(post => {
                let title = post.querySelector('.post-title').textContent.toLowerCase();
                let company = post.querySelector('.post-company').textContent.toLowerCase();
                let author = post.querySelector('.post-author').textContent.toLowerCase();

                if (title.includes(input) || company.includes(input) || author.includes(input)) {
                    post.style.display = "block";
                    hasResults = true;
                } else {
                    post.style.display = "none";
                }
            });

            noResults.style.display = hasResults ? "none" : "flex";
        }
    </script>
@endsection
