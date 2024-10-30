@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">

            {{-- Title --}}
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Posts</h2>
            </div>

            {{-- Post Card Start --}}
            @foreach ($vacancys as $vc)
                <div class="mt-3 grid space-y-4 lg:grid-cols-1">
                    <article class="rounded-lg border border-gray-200 bg-lightblue p-6 shadow-md">
                        <div class="mb-5 flex items-center justify-between text-gray-400">
                            <span class="ml-auto text-sm">
                                {{ $vc->date_difference }}
                            </span>
                        </div>
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <div class="flex-shrink-0">
                                <img
                                    class="h-20 w-20 rounded-full object-cover"
                                    src="{{ $vc->profile_photo }}"
                                    alt="{{ $vc->name }}"
                                />
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
            @endforeach
            {{-- Post Card End --}}

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $vacancys->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>
@endsection
