@extends('layout.headerFooter')

@section('content')
    <section class="bg-white sm:mt-28">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="flex w-full flex-col items-start lg:flex-row">

                <!-- Back Button -->
                <button class="mb-4 lg:mb-0 lg:me-16" onclick="window.location.href='{{ route('posts') }}'">
                    <svg class="h-16 w-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14 8-4 4 4 4" />
                    </svg>
                </button>

                <!-- Content Section -->
                <div class="flex w-full flex-col lg:flex-row">
                    {{-- Post Details --}}
                    <div class="w-full rounded-e-none rounded-s-lg bg-lightblue p-10 sm:border-e-2 sm:border-cyan">
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <div class="flex-shrink-0">
                                <img class="h-28 w-28 rounded-full object-cover"
                                    src="{{ $vacancy->profile_photo }}"
                                    alt="" />
                            </div>
                            <div class="mt-4 lg:mt-0">
                                <!-- Position -->
                                <h2 class="mb-2 text-2xl tracking-tight text-cyan">{{ $vacancy->position }}</h2>
                                <!-- Company Name -->
                                <h2 class="mb-2 text-xl tracking-tight text-cyan">{{ $vacancy->company_name }}</h2>
                                <!-- Posted By "Name" -->
                                <p class="text-lg text-gray-400">Posted by {{ $vacancy->name }}</p>
                            </div>
                        </div>
                        <div class="mt-8 space-y-6">
                            <p class="text-justify text-sm text-cyan">
                                {{ $vacancy->vacancy_description }}
                            </p>
                            <div class="ms-2 space-y-3">
                                <div class="text-cyan">
                                    <h3 class="-ms-2">Responsibilities</h3>
                                    <ul class="ms-2 list-outside list-disc">
                                        @foreach ($vacancy->vacancy_responsibilities as $vr)
                                        <li>{{ $vr }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="text-cyan">
                                    <h3 class="-ms-2">Qualifications</h3>
                                    <ul class="ms-2 list-outside list-disc">
                                        @foreach ($vacancy->vacancy_qualification as $vq)
                                        <li>{{ $vq }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="text-cyan">
                                    <h3 class="-ms-2">Benefits</h3>
                                    <ul class="ms-2 list-outside list-disc">
                                        @foreach ($vacancy->vacancy_benefits as $vb)
                                        <li>{{ $vb }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <img src="{{ $vacancy->vacancy_picture}}"
                                    alt="" />
                            </div>
                        </div>
                    </div>

                    {{-- Comment --}}
                    <div
                        class="mt-4 flex w-full flex-col rounded-e-lg bg-lightblue px-5 py-10 sm:border-s-2 sm:border-cyan lg:mt-0 lg:w-1">
                        <div class="mx-2 mt-10 max-w-md flex-grow">
                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <img src="https://via.placeholder.com/40" alt="avatar"
                                        class="h-10 w-10 rounded-full object-cover">
                                    <div class="relative max-w-xs">
                                        <div
                                            class="relative rounded-b-full rounded-e-full rounded-tl-none bg-cyan-200 px-4 py-3 text-white">
                                            Halo, bisa minta info lebih lanjut?
                                        </div>
                                        <span class="mt-1 block text-xs text-gray-500">10/8/2024 10:00 AM</span>
                                    </div>
                                </div>
                                {{-- Reply --}}
                                <div class="ms-14 flex items-start space-x-4">
                                    <img src="https://via.placeholder.com/40" alt="avatar"
                                        class="h-10 w-10 rounded-full object-cover">
                                    <div class="relative max-w-xs">
                                        <div
                                            class="relative rounded-b-full rounded-e-full rounded-tl-none bg-cyan-200 px-4 py-3 text-white">
                                            gak
                                        </div>
                                        <span class="mt-1 block text-xs text-gray-500">10/8/2024 10:00 AM</span>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <img src="https://via.placeholder.com/40" alt="avatar"
                                        class="h-10 w-10 rounded-full object-cover">
                                    <div class="relative max-w-xs">
                                        <div
                                            class="relative rounded-b-full rounded-e-full rounded-tl-none bg-cyan-200 px-4 py-3 text-white">
                                            apasi bjir
                                        </div>
                                        <span class="mt-1 block text-xs text-gray-500">10/8/2024 10:00 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Input Section -->
                        <div class="mt-auto flex items-center space-x-2">
                            <input type="text"
                                class="bg-input-cyan-200 flex-grow rounded-xl border px-4 py-2 placeholder-white"
                                placeholder="...">
                            <button type="submit">
                                <svg class="h-11 w-11 rotate-90 text-cyan" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
