@extends('layout.headerFooter')

@section('content')
    {{-- Carousel Start --}}
    <section id="default-carousel" class="relative mt-20 w-full" data-carousel="slide">
        <div class="relative h-screen overflow-hidden">

            {{-- Slide 1 --}}
            <div class="absolute inset-0 translate-x-full transform transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="flex h-full w-full items-center justify-start bg-gray-700 bg-jumbotron bg-center bg-no-repeat px-4 py-20 text-start bg-blend-multiply shadow md:py-24 lg:py-56">
                    <div class="mx-auto w-full max-w-screen-xl text-white">
                        <h1 class="mb-4 text-3xl leading-tight sm:text-4xl md:text-5xl lg:text-6xl">
                            Strategi Alumni Meraih Karier di Perusahaan Terbaik
                        </h1>
                        <p class="mb-8 text-base font-normal text-gray-300 sm:text-lg lg:text-xl">
                            Memasuki dunia kerja setelah lulus merupakan tantangan tersendiri bagi banyak alumni...
                        </p>
                        {{-- <a href="{{ route('404') }}"
                            class="inline-flex items-center justify-center rounded-lg bg-cyan-100 px-5 py-3 text-base font-medium text-white hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a> --}}
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="absolute inset-0 translate-x-0 transform transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="bg-jumbotron-2 flex h-full w-full items-center justify-start bg-gray-700 bg-center bg-no-repeat px-4 py-20 text-start bg-blend-multiply shadow md:py-24 lg:py-56">
                    <div class="mx-auto w-full max-w-screen-xl text-white">
                        <h1 class="mb-4 text-3xl leading-tight sm:text-4xl md:text-5xl lg:text-6xl">
                            Adaptasi dan Skill Baru: Tantangan Dunia Kerja di Era Digital
                        </h1>
                        <p class="mb-8 text-base font-normal text-gray-300 sm:text-lg lg:text-xl">
                            Era digital membawa perubahan besar dalam dunia kerja. Kemajuan teknologi mengharuskan para
                            profesional untuk terus beradaptasi dengan berbagai skill baru yang dibutuhkan oleh
                            industri. Dari kemampuan analisis data hingga keahlian dalam menggunakan alat kolaborasi...
                        </p>
                        {{-- <a href="{{ route('404') }}"
                            class="inline-flex items-center justify-center rounded-lg bg-cyan-100 px-5 py-3 text-base font-medium text-white hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a> --}}
                    </div>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="absolute inset-0 translate-x-1 transform transition-transform duration-700 ease-in-out"
                data-carousel-item>
                <div
                    class="bg-jumbotron-3 flex h-full w-full items-center justify-start bg-gray-700 bg-center bg-no-repeat px-4 py-20 text-start bg-blend-multiply shadow md:py-24 lg:py-56">
                    <div class="mx-auto w-full max-w-screen-xl text-white">
                        <h1 class="mb-4 text-3xl leading-tight sm:text-4xl md:text-5xl lg:text-6xl">
                            Tips & Trik Karir: Panduan Memasuki Dunia Kerja bagi Fresh Graduate
                        </h1>
                        <p class="mb-8 text-base font-normal text-gray-300 sm:text-lg lg:text-xl">
                            Memasuki dunia kerja sebagai fresh graduate bisa menjadi tantangan tersendiri. Selain
                            persaingan yang ketat, lulusan baru juga perlu memahami etika profesional dan cara
                            beradaptasi di lingkungan kerja yang dinamis. ...
                        </p>
                        {{-- <a href="{{ route('404') }}"
                            class="inline-flex items-center justify-center rounded-lg bg-cyan-100 px-5 py-3 text-base font-medium text-white hover:bg-white hover:text-cyan-100 focus:ring-4 focus:ring-cyan">
                            Read More
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Carousel Indicators --}}
        <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
            <button type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>

        {{-- Previous Button --}}
        <button type="button"
            class="group absolute left-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke -linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        {{-- Next Button --}}
        <button type="button"
            class="group absolute right-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 9l4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </section>
    {{-- Carousel End --}}

    {{-- Content Start --}}
    <section class="mx-auto max-w-screen-xl px-4 py-10">
        <div class="flex flex-col lg:flex-row lg:space-x-8">

            {{-- Posts Section Start --}}
            <div class="w-full rounded-lg bg-cyan-100 p-6">
                <h1 class="mb-3 text-xl text-white sm:text-2xl">Posts</h1>
                {{-- @foreach ($posts as $ps)
                    <a href="{{ route('posts.detail', ['id' => $ps->id_vacancy]) }}">
                        <div data-aos="fade-up" class="mb-4 cursor-pointer">
                            <article class="rounded-lg border border-gray-500 bg-lightblue px-6 pb-0 pt-2 shadow-lg">
                                <div class="mb-2.5 flex items-center justify-between text-gray-400">
                                    <span class="ml-auto text-sm">
                                        {{ $ps->date_difference }}
                                    </span>
                                </div>
                                <div class="mb-2 flex flex-col sm:flex-row sm:space-x-4">
                                    <div class="h-16 w-16">
                                        <img class="h-full w-full rounded-full object-cover"
                                            src="{{ asset('storage/profile/' . $ps->profile_photo) }}"
                                            alt="Profile Photo" />
                                    </div>
                                    <div class="mt-2">
                                        <h2 class="text-md text-cyan sm:text-lg lg:text-xl">
                                            {{ $ps->name }}
                                        </h2>
                                        <h2 class="sm:text-md text-xs text-cyan">
                                            <span class="text-gray-400">Searching for:</span>
                                            {{ $ps->position }}
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <p class="my-3 max-w-lg truncate text-xs sm:text-base">
                                        {{ $ps->vacancy_description }}
                                    </p>
                                    <img class="h-36 w-full rounded-tl-md rounded-tr-md object-cover md:h-40"
                                        src="{{ asset('storage/vacancies/' . $ps->vacancy_picture) }}"
                                        alt="Vacancy Picture" />
                                </div>
                            </article>
                        </div>
                    </a>
                @endforeach --}}

                <div id="posts-container">

                </div>

                <a href="{{ route('posts') }}"
                    class="mt-2 inline-flex items-center justify-center rounded-lg bg-white px-6 py-2 text-base text-cyan hover:bg-cyan hover:text-white sm:px-12 sm:py-3 sm:text-lg">
                    More
                </a>
            </div>
            {{-- End Posts Section --}}

            {{-- Top Companies Section --}}
            <div class="mt-6 flex w-full flex-col justify-between rounded-lg bg-cyan-100 p-6 lg:mt-0 lg:w-1/4">
                <h1 class="mb-4 text-xl text-white">Top 5 Companies Alumni Work For</h1>
                <div class="flex flex-grow flex-col">
                    {{-- @foreach ($company as $com)
                        <a href="{{ route('companies.detail', ['id' => $com->id_company]) }}">
                            <div class="mb-5 flex-grow-0">
                                <article data-aos="fade-up"
                                    class="cursor-pointer rounded-lg border border-gray-500 bg-lightblue p-4 py-5 shadow-lg">
                                    <div class="flex flex-col sm:flex-row sm:space-x-4">
                                        <div>
                                            <img class="h-16 w-16 rounded-full object-cover"
                                                src="{{ $com->company_picture }}" alt="Company Picture" />
                                        </div>
                                        <div class="mt-2 sm:mt-0">
                                            <h2 class="text-md text-cyan sm:text-lg lg:text-xl">
                                                {{ $com->company_name }}
                                            </h2>
                                            <div class="mt-2 flex items-center space-x-0.5 sm:space-x-1">
                                                <span class="text-sm sm:text-lg">
                                                    {{ $com->employee_count }}
                                                </span>
                                                <div class="flex items-center space-x-1 sm:space-x-0">
                                                    @php
                                                        $numIcons = min(ceil($com->employee_count / 2), 7);
                                                    @endphp

                                                    @for ($i = 0; $i < $numIcons; $i++)
                                                        <img src="{{ asset('assets/lulusan.svg') }}" alt="Alumni Icon"
                                                            class="h-6 w-6 sm:h-8 sm:w-8" />
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </a>
                    @endforeach --}}

                    <div id="companies-container">

                    </div>

                </div>
            </div>
            {{-- End Top Companies Section --}}

        </div>
    </section>
    {{-- Content End --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Posts API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            axios.get('http://127.0.0.1:8000/api/posts', {
                    withCredentials: true
                })
                .then(response => {
                    const postsContainer = document.getElementById('posts-container');
                    const allPosts = response.data.data; // Access the data array from the response
                    const posts = allPosts.slice(0, 2); // Only take the first 2 posts

                    if (posts.length === 0) {
                        postsContainer.innerHTML = '<p>No posts available</p>';
                        return;
                    }

                    let postsHTML = '';
                    posts.forEach(post => {
                        const dateDifference = post.date_open ? calculateDateDifference(post
                            .date_open) : 'Recently';

                        postsHTML += `
                    <a href="/posts/detail/${post.id_vacancy}">
                        <div class="mb-4 cursor-pointer">
                            <article class="rounded-lg border border-gray-500 bg-lightblue px-6 pb-0 pt-2 shadow-lg">
                                <div class="mb-2.5 flex items-center justify-between text-gray-400">
                                    <span class="ml-auto text-sm">
                                        ${dateDifference}
                                    </span>
                                </div>
                                <div class="mb-2 flex flex-col sm:flex-row sm:space-x-4">
                                    <div class="h-16 w-16">
                                        <img class="h-full w-full rounded-full object-cover"
                                            src="/storage/profile/${post.profile_photo || 'default_profile.png'}"
                                            alt="Profile Photo" />
                                    </div>
                                    <div class="mt-2">
                                        <h2 class="text-md text-cyan sm:text-lg lg:text-xl">
                                            ${post.name}
                                        </h2>
                                        <h2 class="sm:text-md text-xs text-cyan">
                                            <span class="text-gray-400">Searching for:</span>
                                            ${post.position}
                                        </h2>
                                    </div>
                                </div>
                                <div>
                                    <p class="my-3 max-w-lg truncate text-xs sm:text-base">
                                        ${post.vacancy_description}
                                    </p>
                                        <img class="h-36 w-full rounded-tl-md rounded-tr-md object-cover md:h-40"
                                            src="/storage/vacancies/${post.vacancy_picture || 'default-vacancy.jpg'}"
                                            alt="Vacancy Picture" />
                                </div>
                            </article>
                        </div>
                    </a>
                `;
                    });

                    postsContainer.innerHTML = postsHTML;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('posts-container').innerHTML =
                        '<p>Error loading posts. Please try again later.</p>';
                });

            function calculateDateDifference(dateString) {
                const postDate = new Date(dateString);
                const now = new Date();
                const diffInDays = Math.floor((now - postDate) / (1000 * 60 * 60 * 24));

                if (diffInDays === 0) return 'Today';
                if (diffInDays === 1) return 'Yesterday';
                if (diffInDays < 7) return `${diffInDays} days ago`;
                if (diffInDays < 30) return `${Math.floor(diffInDays / 7)} weeks ago`;
                return `${Math.floor(diffInDays / 30)} months ago`;
            }
        });
    </script>

    {{-- Companies API --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the companies container
            const companiesContainer = document.getElementById('companies-container');

            // Make API request to get approved companies
            axios.get('http://127.0.0.1:8000/api/home/top-company')
                .then(response => {
                    // Get companies array from the data property of the response
                    const topCompanies = response.data.data.data; // Access the nested data array

                    if (!topCompanies || topCompanies.length === 0) {
                        companiesContainer.innerHTML = '<p class="text-white">No companies available</p>';
                        return;
                    }

                    // Generate HTML for each company
                    let companiesHTML = '';
                    topCompanies.forEach(company => {
                        // Calculate number of alumni icons to show (max 7)
                        const numIcons = Math.min(Math.ceil(company.employee_count / 2), 7);
                        let iconsHTML = '';

                        // Generate alumni icons
                        for (let i = 0; i < numIcons; i++) {
                            iconsHTML += `<img src="{{ asset('assets/lulusan.svg') }}"
                                      alt="Alumni Icon"
                                      class="h-6 w-6 sm:h-8 sm:w-8" />`;
                        }

                        // Handle company picture URL
                        let companyPicture = company.company_picture;
                        if (companyPicture ===
                            'https://picsum.photos/id/870/200/300?grayscale&blur=2') {
                            companyPicture = '/storage/company/default_company.png';
                        } else if (!companyPicture.startsWith('http')) {
                            companyPicture =
                                `/storage/company/${companyPicture || 'default_company.png'}`;
                        }

                        // Company card HTML
                        companiesHTML += `
                    <a href="/companies/detail/${company.id_company}">
                        <div class="mb-5 flex-grow-0">
                            <article
                                class="cursor-pointer rounded-lg border border-gray-500 bg-lightblue p-4 py-5 shadow-lg">
                                <div class="flex flex-col sm:flex-row sm:space-x-4">
                                    <div>
                                        <img class="h-16 w-16 rounded-full object-cover"
                                            src="${companyPicture}"
                                            alt="Company Picture"
                                            onerror="this.src='/storage/company/default_company.png'"/>
                                    </div>
                                    <div class="mt-2 sm:mt-0">
                                        <h2 class="text-md text-cyan sm:text-lg lg:text-xl">
                                            ${company.company_name}
                                        </h2>
                                        <div class="mt-2 flex items-center space-x-0.5 sm:space-x-1">
                                            <span class="text-sm sm:text-lg">
                                                ${company.employee_count}
                                            </span>
                                            <div class="flex items-center space-x-1 sm:space-x-0">
                                                ${iconsHTML}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </a>
                    `;
                    });

                    // Insert HTML into container
                    companiesContainer.innerHTML = companiesHTML;
                })
                .catch(error => {
                    console.error('Error loading companies:', error);
                    companiesContainer.innerHTML = `
                <p class="text-red-500">Error loading companies. Please try again later.</p>
                `;
                });
        });
    </script>
@endsection
