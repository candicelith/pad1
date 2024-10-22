@extends('layout.headerFooter')

@section('content')
    <!-- Title Start -->
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Companies</h2>
            </div>
            <!-- Title End -->

            <!-- Search Start -->
            <div>
                <form class="flex items-center max-w-sm mx-auto">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-gray-200 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-cyan focus:border-cyan block w-full ps-10 p-2.5"
                            placeholder="Search companies..." required>
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
            <div class="flex flex-wrap gap-1 mt-9 mb-16 items-center">
                <div class="flex flex-wrap gap-0.5">
                    <button
                        class="btn-filter text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-sm px-4 py-1 text-center"
                        value="">All</button>
                    @foreach (range('A', 'Z') as $letter)
                        <button
                            class="btn-filter w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                            value="{{ $letter }}">{{ strtolower($letter) }}</button>
                    @endforeach
                </div>
            </div>
            <!-- Filter End -->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                @foreach ($company as $com)
                <div class="w-full max-w-sm bg-lightblue border border-gray-200 rounded-lg shadow-md">
                    <div class="flex flex-col items-center py-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ $com->company_picture }}"
                            alt="Bonnie image" />
                        <h2 class="mb-1 text-xl text-cyan">{{ $com->company_name }}</h2>
                        <h3 class="text-lg text-cyan">{{ $com->company_field }}</h3>
                        <h4 class="text-md text-gray-400">{{ $com->company_address }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
@endsection
