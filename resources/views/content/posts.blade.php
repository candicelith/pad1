@extends('layout.headerFooter')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Posts</h2>
            </div>
            @foreach ($vacancys as $vc)
            <div class="grid lg:grid-cols-1 space-y-4 mt-3">
                <article class="p-6 bg-lightblue rounded-lg border border-gray-200 shadow-md">
                    <div class="flex justify-between items-center mb-5 text-gray-400">
                        <span class="ml-auto text-sm">{{ $vc->date_difference }}</span>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:space-x-8">
                        <div class="flex-shrink-0">
                            <img class="w-20 h-20 rounded-full object-cover"
                                src="{{ $vc->profile_photo }}"
                                alt="{{ $vc->name }}" />
                        </div>
                        <div class="mt-4 lg:mt-0">
                            {{-- Position --}}
                            <h2 class="mb-2 text-2xl tracking-tight text-cyan">{{ $vc->position }}</h2>
                            {{-- Company Name --}}
                            <h2 class="mb-2 text-xl tracking-tight text-cyan">{{ $vc->company_name }}</h2>
                            {{-- Posted By "Name" --}}
                            <p class="text-lg text-gray-400">Posted by {{ $vc->name }}</p>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $vacancys->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>
@endsection
