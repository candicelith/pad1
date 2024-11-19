@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">

            <!-- Back Button -->
            <button class="mb-4 lg:mb-0 lg:me-5" onclick="handleBack()">
                <svg class="h-12 w-12 text-gray-800 dark:text-white sm:h-16 sm:w-16" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                {{-- Companies Details --}}
                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="lg:mx-14">
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                src="{{ $company->company_picture }}" alt="" />
                            <div class="mt-4">
                                <h2 class="text-xl text-cyan sm:text-2xl">{{ $company->company_name }}</h2>
                                <h3 class="text-md text-cyan sm:text-lg">{{ $company->company_field }}</h3>
                                <h4 class="text-sm text-gray-500 sm:text-base">{{ $company->company_address }}</h4>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                            <p class="sm:text-md text-justify text-sm text-cyan">
                                {{ $company->company_description }}
                            </p>
                        </div>

                        <div class="flex flex-col space-y-4 pt-5">
                            <div class="scrollbar-hide flex overflow-x-auto">
                                <img src=" {{ asset('assets/company-2.png') }} " alt="">
                                <img src=" {{ asset('assets/company-3.png') }} " alt="">
                                <img src=" {{ asset('assets/company-1.png') }} " alt="">
                                <img src=" {{ asset('assets/company-2.png') }} " alt="">
                                <img src=" {{ asset('assets/company-3.png') }} " alt="">
                                <img src=" {{ asset('assets/company-1.png') }} " alt="">
                            </div>
                            <div class="flex justify-end">
                                <span class="text-sm text-cyan sm:text-base">Scroll for more </span>
                                <svg class="h-6 w-6 text-cyan" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </div>
                            @if ($workers->isNotEmpty())
                                <h4 class="sticky top-0 z-10 pb-6 text-lg text-cyan sm:text-xl">
                                    Career Journeys
                                </h4>
                            @endif

                            <div
                                class="scrollbar-companies smpx-8 grid max-h-[700px] gap-16 overflow-y-auto sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($workers as $wk)
                                    <a href="{{ route('alumni.detail', ['id' => $wk->id_userDetails]) }}"
                                        class="mt-0 w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg">
                                        <div data-name="Supri" data-year="2020">
                                            <div class="flex flex-col items-center px-3 py-7 text-center">
                                                <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                                    <span class="text-sm">
                                                        {{ $wk->graduate_year }}
                                                    </span>
                                                </div>
                                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                                    src="{{ $wk->profile_photo }}" alt="{{ $wk->name }} image" />
                                                <h2 class="mb-1 text-lg text-white sm:text-xl">
                                                    {{ $wk->name }}
                                                </h2>
                                                <h3 class="text-base text-white">
                                                    {{ $wk->current_job }}
                                                </h3>
                                                <h4 class="text-sm text-gray-300">
                                                    {{ $wk->date_start }} - {{ $wk->date_end }}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            {{-- Script for Handling Back Button --}}
                            <script>
                                function handleBack() {
                                    // Check if there is a previous page in history
                                    if (document.referrer) {
                                        window.history.back();
                                    } else {
                                        // Redirect to the specified route if no previous page
                                        window.location.href = "{{ route('companies') }}";
                                    }
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
