@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            {{-- Title --}}
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Posts</h2>
            </div>

            @auth
            @if (Auth::check() && Auth::user()->id_roles=="2")
            {{-- New Post Button --}}
            <div class="mt-6 flex justify-end">
                <a
                    href="{{ route('createpost') }}"
                    class="items-center rounded-full bg-cyan-100 px-5 py-1 text-lg text-white shadow hover:bg-white hover:text-cyan-100"
                >
                    New Post +
                </a>
            </div>
            @endif
            @endauth


            {{-- Post Card Start --}}
            @foreach ($vacancys as $vc)
            <a href="{{ route('posts.detail', ['id' => (String) $vc->id_vacancy]) }}">
                <div class="mt-3 grid space-y-4 lg:grid-cols-1">
                    <article class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-md"
                        onclick="navigateToDetailPost()">
                        <div class="mb-5 flex items-center justify-between text-gray-400">
                            <span class="ml-auto text-sm">
                                {{ $vc->date_difference }}
                            </span>
                        </div>
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <div class="flex-shrink-0">
                                <img class="h-20 w-20 rounded-full object-cover" src="{{ $vc->profile_photo }}"
                                    alt="{{ $vc->name }}" />
                            </div>
                            <div class="mt-4 lg:mt-0">
                                {{-- Position --}}
                                <h2 class="mb-2 text-2xl tracking-tight text-cyan">
                                    {{ $vc->position }}
                                </h2>
                                {{-- Company Name --}}
                                <h2 class="mb-2 text-xl tracking-tight text-cyan">
                                    {{ $vc->company_name }}
                                </h2>
                                {{-- Posted By "Name" --}}
                                <p class="text-lg text-gray-400">Posted by {{ $vc->name }}</p>
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
