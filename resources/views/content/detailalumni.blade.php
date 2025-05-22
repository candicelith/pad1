@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">
            <!-- Back Button -->
            <button class="sm:mb-4 sm:me-16" onclick="history.back()">
                <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                {{-- Alumni Details --}}
                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="lg:mx-14">
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}" alt="" />
                            <div class="mt-4">
                                <h2 class="text-xl text-cyan sm:text-2xl">{{ $userDetails->name }}</h2>
                                <h3 class="text-md text-cyan sm:text-lg">{{ $userDetails->current_job }},
                                    {{ $userDetails->current_company }}</h3>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                            <p class="sm:text-md text-sm text-cyan sm:text-justify">
                                {{ $userDetails->user_description }}
                            </p>
                        </div>

                        <div class="flex flex-col space-y-4 pt-5">
                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                            <ol class="relative ms-4 border-s border-gray-900">
                                @foreach ($jobDetails as $job)
                                    <li class="mb-10 ms-4">
                                        <div
                                            class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                        </div>

                                        {{-- Job Drawer Toggle --}}
                                        <button data-drawer-target="job-drawer" data-drawer-show="job-drawer"
                                            data-drawer-body-scrolling="true" data-drawer-backdrop="false"
                                            data-drawer-placement="right" aria-controls="job-drawer"
                                            class="text-lg text-cyan hover:underline sm:text-xl">{{ $job->job_name }}</button>

                                        {{-- Drawer Content --}}
                                        <div id="job-drawer"
                                            class="fixed right-0 top-28 z-20 translate-x-full rounded-lg bg-cyan-400 p-4 transition-transform xl:w-2/5"
                                            tabindex="-1" aria-labelledby="drawer-right-label">
                                            <div
                                                class="flex items-center justify-between rounded-t border-b border-white md:py-4">
                                                <h3 class="text-2xl text-cyan">
                                                    {{ $job->job_name }}
                                                </h3>
                                                <button type="button"
                                                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white"
                                                    data-drawer-hide="job-drawer" aria-controls="job-drawer">
                                                    <svg class="h-6 w-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="scrollbar-modal max-h-96 space-y-4 overflow-y-auto">
                                                <div class="grid gap-4 py-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                                    <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                                                        href="">
                                                        <div {{-- data-aos="fade-up" --}}>
                                                            <div class="flex flex-col items-center p-2 text-center">
                                                                <div
                                                                    class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                                                    <span class="text-sm">
                                                                        2019
                                                                    </span>
                                                                </div>
                                                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                                                    src="" alt=" image" />
                                                                <h2 class="mb-1 text-2xl text-cyan">
                                                                    SUpri
                                                                </h2>
                                                                <h3 class="text-base text-cyan">
                                                                    Software engineer
                                                                </h3>
                                                                <h4 class="text-sm text-gray-500">
                                                                    Tokped
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                                                        href="">
                                                        <div {{-- data-aos="fade-up" --}}>
                                                            <div class="flex flex-col items-center p-2 text-center">
                                                                <div
                                                                    class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                                                    <span class="text-sm">
                                                                        2019
                                                                    </span>
                                                                </div>
                                                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                                                    src="" alt=" image" />
                                                                <h2 class="mb-1 text-2xl text-cyan">
                                                                    SUpri
                                                                </h2>
                                                                <h3 class="text-base text-cyan">
                                                                    Software engineer
                                                                </h3>
                                                                <h4 class="text-sm text-gray-500">
                                                                    Tokped
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                                                        href="">
                                                        <div {{-- data-aos="fade-up" --}}>
                                                            <div class="flex flex-col items-center p-2 text-center">
                                                                <div
                                                                    class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                                                    <span class="text-sm">
                                                                        2019
                                                                    </span>
                                                                </div>
                                                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                                                    src="" alt=" image" />
                                                                <h2 class="mb-1 text-2xl text-cyan">
                                                                    SUpri
                                                                </h2>
                                                                <h3 class="text-base text-cyan">
                                                                    Software engineer
                                                                </h3>
                                                                <h4 class="text-sm text-gray-500">
                                                                    Tokped
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md"
                                                        href="">
                                                        <div {{-- data-aos="fade-up" --}}>
                                                            <div class="flex flex-col items-center p-2 text-center">
                                                                <div
                                                                    class="mb-5 flex w-full justify-end px-6 text-gray-400">
                                                                    <span class="text-sm">
                                                                        2019
                                                                    </span>
                                                                </div>
                                                                <img class="mb-3 h-24 w-24 rounded-full shadow-lg"
                                                                    src="" alt=" image" />
                                                                <h2 class="mb-1 text-2xl text-cyan">
                                                                    SUpri
                                                                </h2>
                                                                <h3 class="text-base text-cyan">
                                                                    Software engineer
                                                                </h3>
                                                                <h4 class="text-sm text-gray-500">
                                                                    Tokped
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="text-base text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                            {{ $job->date_end }}</p>
                                        <ol class="ms-4 list-outside list-disc text-sm sm:text-base">
                                            @if (is_array($job->job_description))
                                                @foreach ($job->job_description as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
