@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-16 sm:ms-60">
            <div
                class="mx-4 mt-14 flex max-w-screen-xl flex-col items-start justify-center px-2 py-8 sm:mx-auto sm:ms-4 sm:flex-row sm:px-4">
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
                            <div class="flex flex-col lg:flex-row lg:space-x-8">
                                <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28" src="{{ asset('storage/company/' . $company->company_picture) }}"
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
                            </div>

                            <div class="flex flex-col space-y-4 pt-5">
                                <div class="splide flex">
                                    <div class="splide__slider">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @if ($company->company_gallery && is_array($company->company_gallery))
                                                    @foreach ($company->company_gallery as $photo)
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('storage/company/gallery/' . $photo) }}"
                                                                 alt="Company Photo"
                                                                 class="w-full h-48 object-cover rounded-lg shadow">
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li class="splide__slide">
                                                        <img src="{{ asset('assets/company-1.png') }}" alt="No photo">
                                                    </li>
                                                    <li class="splide__slide">
                                                        <img src="{{ asset('assets/company-2.png') }}" alt="No photo">
                                                    </li>
                                                    <li class="splide__slide">
                                                        <img src="{{ asset('assets/company-3.png') }}" alt="No photo">
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <div class="button-group flex items-center space-x-2">
                                {{-- Approve Button --}}
                                <form method="POST" action="{{ route('admin.company.approve', $company->id_company) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button class="rounded-full bg-green-800 px-5 py-1 text-white hover:bg-green-600"
                                        type="submit">
                                        Accept
                                    </button>
                                </form>
                                {{-- Decline Button --}}
                                <form method="POST" action="{{ route('admin.company.reject', $company->id_company) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button class="rounded-full bg-red-900 px-5 py-1 text-white hover:bg-red-700"
                                        type="submit">
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </section>
@endsection
