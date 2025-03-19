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

        <div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-0">
            {{-- Post Card Start --}}
            @foreach ($vacancys as $vc)
                <a href="{{ route('posts.detail', ['id' => (string) $vc->id_vacancy]) }}">
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
                                    <h2 class="mb-2 text-xl tracking-tight text-cyan sm:text-2xl">
                                        {{ $vc->position }}
                                    </h2>
                                    {{-- Company Name --}}
                                    <h2 class="mb-2 text-base tracking-tight text-cyan sm:text-xl">
                                        {{ $vc->company_name }}
                                    </h2>
                                    {{-- Posted By "Name" --}}
                                    <p class="text-sm text-gray-400 sm:text-lg">Posted by {{ $vc->name }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </a>
            @endforeach

            {{-- Post Card End --}}

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $vacancys->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>
@endsection
