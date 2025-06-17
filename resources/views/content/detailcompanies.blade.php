@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">

            <!-- Back Button -->
            <button class="sm:mb-4 sm:me-16" onclick="handleBack()">
                <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                {{-- Companies Details --}}
                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="lg:mx-14">
                        <div id="company-content">

                        </div>
                        {{-- <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                src="{{ $company->company_picture ? asset('storage/company/' . $company->company_picture) : asset('images/default_profile.png') }}"
                                alt="" />
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
                        </div> --}}

                        <div class="flex flex-col space-y-4 pt-5">
                            <div class="splide flex">
                                <div class="splide__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src=" {{ asset('assets/company-2.png') }} "
                                                    alt=""></li>
                                            <li class="splide__slide"><img src=" {{ asset('assets/company-3.png') }} "
                                                    alt=""></li>
                                            <li class="splide__slide"><img src=" {{ asset('assets/company-1.png') }} "
                                                    alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="workers-container">

                            </div>
                            @if ($workers->isNotEmpty())
                                <h4 class="sticky top-0 z-10 text-lg text-cyan sm:text-xl">
                                    Career Journeys
                                </h4>
                            @endif

                            <div
                                class="scrollbar-companies grid max-h-[700px] gap-6 overflow-y-auto px-4 sm:grid-cols-1 sm:px-8 md:grid-cols-2 lg:grid-cols-3">
                                @forelse ($workers as $worker)
                                    <a href="{{ route('alumni.detail', ['id' => $worker->id_userDetails]) }}"
                                        class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg transition-transform duration-300 hover:scale-105">
                                        <div class="flex flex-col items-center px-3 py-7 text-center">
                                            {{-- Graduate Year --}}
                                            <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                                <span class="text-sm">
                                                    {{ $worker->graduate_year ?? 'N/A' }}
                                                </span>
                                            </div>

                                            {{-- Profile Image --}}
                                            <img class="mb-3 h-24 w-24 rounded-full object-cover shadow-lg"
                                                src="{{ $worker->profile_photo
                                                    ? asset('storage/profile/' . $worker->profile_photo)
                                                    : asset('images/default-profile.png') }}"
                                                alt="{{ $worker->name }} profile" />

                                            {{-- Name --}}
                                            <h2 class="mb-1 text-lg text-white sm:text-xl">
                                                {{ $worker->name }}
                                            </h2>
                                            {{-- Job Duration --}}
                                            <h4 class="text-sm text-gray-300">
                                                @if ($worker->date_start && $worker->date_end)
                                                    {{ $worker->date_start }} - {{ $worker->date_end }}
                                                @else
                                                    Employment Dates Unavailable
                                                @endif
                                            </h4>
                                        </div>
                                    </a>
                                @empty
                                    <div class="col-span-full py-10 text-center text-gray-500">
                                        <p class="text-xl">No workers found for this company</p>
                                    </div>
                                @endforelse
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Detail Comp API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const companyId = window.location.pathname.split('/').pop();

            axios.get(`http://127.0.0.1:8000/api/companies/${companyId}`, {
                    withCredentials: true
                })
                .then(companyResponse => {
                    const company = companyResponse.data.company;
                    const container = document.getElementById('company-content');

                    // Handle company picture URL
                    let companyPicture = company.company_picture;
                        if (companyPicture ===
                            'https://picsum.photos/id/870/200/300?grayscale&blur=2') {
                            companyPicture = '/storage/company/default_company.png';
                        } else if (!companyPicture.startsWith('http')) {
                            companyPicture =
                                `/storage/company/${companyPicture || 'default_company.png'}`;
                        }

                    container.innerHTML = `
                <div class="flex flex-col lg:flex-row lg:space-x-8">
                    <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                        src="${companyPicture}"
                        alt="${company.company_name}" />
                    <div class="mt-4">
                        <h2 class="text-xl text-cyan sm:text-2xl">${company.company_name}</h2>
                        <h3 class="text-md text-cyan sm:text-lg">${company.company_field}</h3>
                        <h4 class="text-sm text-gray-500 sm:text-base">${company.company_address}</h4>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                    <p class="sm:text-md text-justify text-sm text-cyan">
                        ${company.company_description}
                    </p>
                </div>
            `;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('company-content').innerHTML = `
                <div class="col-span-full py-10 text-center text-gray-500">
                    <p class="text-xl">Error loading company details. Please try again later.</p>
                </div>
            `;
                });
        });
    </script>

    {{-- Splide.js for Carousel --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1/dist/js/splide.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5/dist/js/splide-extension-auto-scroll.min.js">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1/dist/css/splide.min.css">
    <script>
        const splide = new Splide('.splide', {
            type: 'loop',
            drag: 'free',
            focus: 'center',
            perPage: 3,
            gap: '0',
            pagination: false,
            arrows: false,
            autoScroll: {
                speed: 0.5,
            },
            breakpoints: {
                640: {
                    perPage: 1,
                },
                768: {
                    perPage: 2,
                },
                1024: {
                    perPage: 3,
                },
            },
        });
        splide.mount(window.splide.Extensions);
    </script>
@endsection
