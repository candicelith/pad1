@extends('layout.headerFooter')

@section('content')
    <!-- Hero Carousel Start -->
    <section id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-screen overflow-hidden">
            <!-- Slide 1 -->
            <div class="absolute inset-0 transform translate-x-full transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="bg-center bg-no-repeat bg-jumbotron shadow bg-gray-700 bg-blend-multiply h-full flex items-center justify-start px-4 text-start py-20 md:py-24 lg:py-56 w-full">
                    <div class="text-white w-full max-w-screen-xl mx-auto">
                        <h1 class="mb-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-tight">
                            Strategi Alumni Meraih Karier di Perusahaan Terbaik
                        </h1>
                        <p class="mb-8 text-base sm:text-lg lg:text-xl font-normal text-gray-300">
                            Memasuki dunia kerja setelah lulus merupakan tantangan tersendiri bagi banyak alumni...
                        </p>
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-white bg-cyan-100 rounded-lg hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="absolute inset-0 transform translate-x-0 transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="bg-center bg-no-repeat shadow bg-gray-700 bg-blend-multiply h-full flex items-center justify-start px-4 text-start py-20 md:py-24 lg:py-56 w-full">
                    <div class="text-white w-full max-w-screen-xl mx-auto">
                        <h1 class="mb-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-tight">
                            Kiat Sukses Alumni Bekerja di Perusahaan Multinasional
                        </h1>
                        <p class="mb-8 text-base sm:text-lg lg:text-xl font-normal text-gray-300">
                            Memahami langkah-langkah yang diperlukan untuk bisa bekerja di perusahaan ternama...
                        </p>
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-white bg-cyan-100 rounded-lg hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="absolute inset-0 transform translate-x-1 transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="bg-center bg-no-repeat shadow bg-gray-700 bg-blend-multiply h-full flex items-center justify-start px-4 text-start py-20 md:py-24 lg:py-56 w-full">
                    <div class="text-white w-full max-w-screen-xl mx-auto">
                        <h1 class="mb-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-tight">
                            Kiat Sukses Alumni Bekerja di Perusahaan Multinasional
                        </h1>
                        <p class="mb-8 text-base sm:text-lg lg:text-xl font-normal text-gray-300">
                            Memahami langkah-langkah yang diperlukan untuk bisa bekerja di perusahaan ternama...
                        </p>
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-white bg-cyan-100 rounded-lg hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>

        <!-- Carousel Controls -->
        <!-- Previous Button -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke -linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <!-- Next Button -->
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 9l4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </section>
    <!-- Hero Carousel End -->

    <!-- Content Start -->
    <section class="px-4 mx-auto max-w-screen-xl py-10">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <!-- Posts Section -->
            <div class="w-full lg:w-3/4 bg-cyan-100 rounded-lg p-6">
                <h1 class="text-xl sm:text-2xl mb-4 text-white">Posts</h1>
                @foreach ($posts as $ps)
                    <a href="{{ route('detailpost') }}">
                        <div class="mb-4">
                            <article class="pt-6 pl-6 pr-6 pb-0 bg-lightblue rounded-lg border border-gray-500 shadow-lg">
                                <div class="flex justify-between items-center mb-5 text-gray-400">
                                    <span class="ml-auto text-sm">{{ $ps->date_difference }}</span>
                                </div>
                                <div class="flex space-x-4 sm:space-x-8 mb-2">
                                    <div class="w-16 h-16 xs:w-10 xs:h-10">
                                        <img class="w-full h-full rounded-full object-cover" src="{{ $ps->profile_photo }}"
                                            alt="Profile Photo" />
                                    </div>
                                    <div>
                                        <h2 class="text-md sm:text-lg lg:text-xl text-cyan">{{ $ps->name }}</h2>
                                        <h2 class="text-xs sm:text-md text-cyan">
                                            <span class="text-gray-400">Searching for: </span>{{ $ps->position }}
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs sm:text-base">{{ $ps->vacancy_description }}</p>
                                    <img class="w-full h-32 md:h-40 rounded-tr-md rounded-tl-md object-cover"
                                        src="{{ $ps->vacancy_picture }}" alt="Vacancy Picture" />
                                </div>
                            </article>
                        </div>
                    </a>
                @endforeach
                <a href="{{ route('posts') }}"
                    class="mt-4 inline-flex justify-center items-center py-2 px-4 text-cyan bg-white rounded-lg hover:bg-cyan hover:text-white">
                    More
                </a>
            </div>
            <!-- End Posts Section -->

            <!-- Top Companies Section -->
            <div class="w-full lg:w-1/4 bg-cyan-100 rounded-lg p-6 mt-6 lg:mt-0 flex flex-col justify-between h-full">
                <h1 class="text-xl sm:text-2xl mb-4 text-white">Top 10 Companies Alumni Work For</h1>
                <div class="flex flex-col flex-grow">
                    @foreach ($company as $com)
                        <div class="mb-5 flex-grow-0">
                            <article class="p-3 bg-lightblue rounded-lg border border-gray-500 shadow-lg">
                                <div class="flex space-x-4 sm:space-x-8">
                                    <div>
                                        <img class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover"
                                            src="{{ $com->company_picture }}" alt="Company Picture" />
                                    </div>
                                    <div>
                                        <h2 class="text-md sm:text-lg lg:text-xl text-cyan">{{ $com->company_name }}</h2>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="text-xs sm:text-base">{{ $com->employee_count }}</span>
                                            <div class="flex items-center space-x-1">
                                                @php
                                                    // Set maximum icons to 7, with each icon representing 2 employees
                                                    $numIcons = min(ceil($com->employee_count / 2), 7);
                                                @endphp
                                                @for ($i = 0; $i < $numIcons; $i++)
                                                    <img src="{{ asset('assets/lulusan.svg') }}" alt="Alumni Icon"
                                                        class="w-6 h-6 sm:w-8 sm:h-8" />
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End Top Companies Section -->
        </div>
    </section>
    <!-- Content End -->
@endsection
