@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if (Session::has('success'))
            <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                {!! Session::get('success') !!}
            </div>
        @endif

        <div class="sticky top-20 z-20 w-full bg-white pb-8 pt-16">
            {{-- Title --}}
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Posts</h2>
            </div>

            @auth
                @if (Auth::check() && Auth::user()->id_roles == '2')
                    {{-- New Post Button --}}
                    <div class="mx-auto mt-6 flex max-w-screen-xl justify-end px-4 sm:px-6">
                        <a href="{{ route('posts.create') }}"
                            class="items-center rounded-full bg-cyan-100 px-5 py-1 text-sm text-white shadow hover:bg-white hover:text-cyan-100 sm:text-lg">
                            New Post +
                        </a>
                    </div>
                @endif
            @endauth
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6">
            {{-- Post Card Start --}}
            @foreach ($vacancys as $vc)
                <a href="{{ route('posts.detail', ['id' => (string) $vc->id_vacancy]) }}">
                    <div data-aos="fade-up" class="mt-3 grid space-y-4 lg:grid-cols-1">
                        <article class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-md"
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
