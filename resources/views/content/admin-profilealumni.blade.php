@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-16 sm:ms-60">
            <div
                class="mx-4 mt-14 flex max-w-screen-xl flex-col items-start justify-center px-2 py-8 sm:mx-auto sm:ms-4 sm:flex-row sm:px-4">
                <!-- Back Button -->
                <button class="mb-4" onclick="history.back()">
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
                                    <h2 class="text-xl text-cyan sm:text-2xl">Andi Prasetyo</h2>
                                    <h3 class="text-md text-cyan sm:text-lg">UI/UX Designer, PT. Traveloka Indonesia</h3>
                                </div>
                            </div>

                            <div class="mt-8 space-y-4">
                                <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                                <p class="sm:text-md text-justify text-sm text-cyan">
                                    Saya Andi, seorang UI/UX Designer. Saya telah bekerja dengan berbagai klien di industri
                                    teknologi, e-commerce, dan pendidikan. Dalam setiap proyek, saya selalu berusaha untuk
                                    memahami kebutuhan pengguna melalui riset dan pengujian, yang memungkinkan saya untuk
                                    merancang antarmuka yang tidak hanya estetik tetapi juga fungsional. Saya menguasai
                                    berbagai
                                    alat desain seperti Figma dan Adobe XD, serta memiliki pengetahuan mendalam tentang
                                    prinsip
                                    desain berpusat pada pengguna. Selain itu, saya selalu bersemangat untuk berkolaborasi
                                    dengan tim pengembang untuk menciptakan solusi yang memenuhi ekspektasi pengguna.
                                </p>
                            </div>

                            <div class="flex flex-col space-y-4 pt-5">
                                <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                                <ol class="relative ms-4 border-s border-gray-900">
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
                                            <li>Mengembangkan elemen visual seperti palet warna, tipografi, dan ikonografi.
                                            </li>
                                            <li>Melakukan pengujian A/B untuk membandingkan berbagai versi desain.</li>
                                            <li>Menyusun dokumentasi dan spesifikasi desain untuk memudahkan pengembang.
                                            </li>
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
                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- Edit Button --}}
                    <div class="mx-4 mt-14 flex items-center justify-between p-6 ps-0 sm:mx-14 sm:p-0">
                        <div class="sm:ms-14">
                            <a href="{{ route('admineditalumni') }}"
                                class="sm:text-md rounded-full bg-cyan px-12 py-5 text-sm text-white hover:bg-white hover:text-cyan sm:px-8">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
