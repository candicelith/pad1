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
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="" />
                            <div class="mt-4">
                                <h2 class="text-xl text-cyan sm:text-2xl">{{ $userDetails->name }}</h2>
                                <h3 class="text-md text-cyan sm:text-lg">{{ $userDetails->current_job }},
                                    {{ $userDetails->current_company }}</h3>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                            <p class="sm:text-md text-justify text-sm text-cyan">
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
                                        <h3 class="text-lg text-cyan sm:text-xl">{{ $job->job_name }}</h3>
                                        <h3 class="text-base text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                            {{ $job->date_end }}</p>
                                        <ol class="ms-4 list-outside list-disc text-sm sm:text-base">
                                            @if (is_array($job->job_description))
                                                @foreach ($job->job_description as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @else
                                                <li>{{ $job->job_description }}</li>
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
