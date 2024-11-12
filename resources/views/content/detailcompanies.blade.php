@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">
            <!-- Back Button -->
            <button class="mb-4 lg:mb-0 lg:me-16">
                <svg class="h-16 w-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                {{-- Post Details --}}
                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="lg:mx-14">
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="" />
                            <div class="mt-4">
                                <h2 class="text-xl text-cyan sm:text-2xl">Traveloka Indonesia</h2>
                                <h3 class="text-md text-cyan sm:text-lg">Software Development</h3>
                                <h4 class="text-base text-gray-500">Singapore, Singapore</h4>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                            <p class="sm:text-md text-justify text-sm text-cyan">
                                Traveloka adalah platform teknologi yang berbasis di Indonesia, yang menyediakan layanan
                                pemesanan tiket pesawat, hotel, dan aktivitas wisata. Didirikan pada tahun 2012, Traveloka
                                telah berkembang menjadi salah satu perusahaan terbesar di sektor travel dan lifestyle di
                                Asia Tenggara. Visi Traveloka adalah untuk menjadi platform pilihan utama bagi para
                                pelancong di Asia Tenggara, sementara misinya adalah untuk memudahkan akses terhadap
                                berbagai pilihan perjalanan dan pengalaman, sehingga setiap orang dapat menjelajahi dunia
                                dengan lebih mudah. Dengan layanan yang beragam dan inovatif, Traveloka terus berkomitmen
                                untuk memenuhi kebutuhan para pelancong dan menciptakan pengalaman perjalanan yang tak
                                terlupakan.
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
                                <span class="text-base text-cyan">Scroll for more </span>
                                <svg class="h-6 w-6 text-cyan" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </div>
                            <h4 class="sticky top-0 z-10 pb-6 text-lg text-cyan sm:text-xl">
                                Career
                                Journeys</h4>
                            <div
                                class="scrollbar-companies grid max-h-[700px] gap-16 overflow-y-auto px-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                {{-- @foreach ($alumnis as $al) --}}
                                <div class="mt-0 w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                <div class="w-full max-w-sm rounded-lg border border-gray-200 bg-cyan-100 shadow-lg"
                                    data-name="Supri" data-year="2020">
                                    <div class="flex flex-col items-center px-3 py-7">
                                        <div class="mb-5 flex w-full justify-end px-6 text-gray-300">
                                            <span class="text-sm">
                                                2020
                                            </span>
                                        </div>
                                        <img class="mb-3 h-24 w-24 rounded-full shadow-lg" src=""
                                            alt="Supri image" />
                                        <h2 class="mb-1 text-xl text-white">
                                            Supri
                                        </h2>
                                        <h3 class="text-lg text-white">
                                            UIUX
                                        </h3>
                                        <h4 class="text-md text-gray-300">
                                            Jun 2023 - Present
                                        </h4>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                            {{-- <ol class="relative ms-4 border-s border-gray-900">
                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                    </div>
                                    <h3 class="text-lg text-cyan sm:text-xl">UI/UX Designer</h3>
                                    <h3 class="text-md text-cyan sm:text-lg">Traveloka Indonesia</h3>
                                    <p class="text-xs text-gray-400 sm:text-sm">Aug 2023 - Present</p>
                                    <ol class="ms-2 list-outside list-disc">
                                        <li>Riset pengguna dan analisis kebutuhan.</li>
                                        <li>Membuat wireframes dan prototipe interaktif.</li>
                                        <li>Bekerja sama dengan tim pengembang, pemasar, dan stakeholder lainnya.</li>
                                    </ol>
                                </li>

                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                    </div>
                                    <h3 class="text-lg text-cyan sm:text-xl">UI/UX Designer</h3>
                                    <h3 class="text-md text-cyan sm:text-lg">Shopee Indonesia</h3>
                                    <p class="text-xs text-gray-400 sm:text-sm">Des 2023 - Jul 2023</p>
                                    <ol class="ms-2 list-outside list-disc">
                                        <li>Mengembangkan elemen visual seperti palet warna, tipografi, dan ikonografi.</li>
                                        <li>Melakukan pengujian A/B untuk membandingkan berbagai versi desain.</li>
                                        <li>Menyusun dokumentasi dan spesifikasi desain untuk memudahkan pengembang.</li>
                                    </ol>
                                </li>

                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                    </div>
                                    <h3 class="text-lg text-cyan sm:text-xl">UI/UX Designer</h3>
                                    <h3 class="text-md text-cyan sm:text-lg">Bank Central Asia</h3>
                                    <p class="text-xs text-gray-400 sm:text-sm">Jan 2022 - Dec 2022</p>
                                    <ol class="ms-2 list-outside list-disc">
                                        <li>Menciptakan solusi desain yang inovatif dan menarik.</li>
                                        <li>Mengembangkan persona pengguna berdasarkan data riset.</li>
                                        <li>Mengumpulkan umpan balik dari pengguna dan pemangku kepentingan.</li>
                                    </ol>
                                </li>
                            </ol> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
