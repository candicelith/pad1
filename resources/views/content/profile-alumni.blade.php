@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="w-full max-w-none rounded-3xl bg-lightblue shadow-lg">
                {{-- Profile Image & Banner --}}
                <div class="relative">
                    <div class="h-48 rounded-t-3xl bg-cyan-100"></div>
                    <div class="absolute top-1/2 ms-14">
                        <img
                            class="h-48 w-48 rounded-full object-cover"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                            alt="Profile Picture"
                        />
                    </div>
                </div>

                {{-- Profile Details --}}
                <div class="mx-14 flex flex-col space-y-2">
                    <div class="flex items-center justify-between pt-36">
                        <h2 class="text-2xl text-cyan">Andi Prasetyo</h2>
                        <p class="text-xl text-gray-400">23/565657/SV/23636</p>
                    </div>
                    <h3 class="text-lg text-cyan">UI/UX Designer, PT. Traveloka Indonesia</h3>
                    <div class="flex flex-col space-y-2 pt-5">
                        <h4 class="text-xl text-cyan">About</h4>
                        <p class="text-md text-justify text-cyan">
                            Saya Andi, seorang UI/UX Designer. Saya telah bekerja dengan berbagai klien di industri
                            teknologi, e-commerce, dan pendidikan. Dalam setiap proyek, saya selalu berusaha untuk
                            memahami kebutuhan pengguna melalui riset dan pengujian, yang memungkinkan saya untuk
                            merancang antarmuka yang tidak hanya estetik tetapi juga fungsional. Saya menguasai berbagai
                            alat desain seperti Figma dan Adobe XD, serta memiliki pengetahuan mendalam tentang prinsip
                            desain berpusat pada pengguna. Selain itu, saya selalu bersemangat untuk berkolaborasi
                            dengan tim pengembang untuk menciptakan solusi yang memenuhi ekspektasi pengguna.
                        </p>
                    </div>
                    <div class="flex flex-col space-y-2 pt-5">
                        <h4 class="text-xl text-cyan">Experience</h4>
                        <ol class="relative ms-4 border-s border-gray-900">
                            <li class="mb-10 ms-4">
                                <div
                                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900"
                                ></div>
                                <h3 class="text-xl text-cyan">UI/UX Designer</h3>
                                <h3 class="text-lg text-cyan">Traveloka Indonesia</h3>
                                <p class="text-sm text-gray-400">Aug 2023 - Present</p>
                                <ol class="ms-2 list-inside list-disc">
                                    <li>Riset pengguna dan analisis kebutuhan.</li>
                                    <li>Membuat wireframes dan prototipe interaktif.</li>
                                    <li>Bekerja sama dengan tim pengembang, pemasar, dan stakeholder lainnya.</li>
                                </ol>
                            </li>
                            <li class="mb-10 ms-4">
                                <div
                                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900"
                                ></div>
                                <h3 class="text-xl text-cyan">UI/UX Designer</h3>
                                <h3 class="text-lg text-cyan">Shopee Indonesia</h3>
                                <p class="text-sm text-gray-400">Des 2023 - Jul 2023</p>
                                <ol class="ms-2 list-inside list-disc">
                                    <li>Mengembangkan elemen visual seperti palet warna, tipografi, dan ikonografi.</li>
                                    <li>Melakukan pengujian A/B untuk membandingkan berbagai versi desain.</li>
                                    <li>Menyusun dokumentasi dan spesifikasi desain untuk memudahkan pengembang.</li>
                                </ol>
                            </li>
                            <li class="mb-10 ms-4">
                                <div
                                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900"
                                ></div>
                                <h3 class="text-xl text-cyan">UI/UX Designer</h3>
                                <h3 class="text-lg text-cyan">Bank Central Asia</h3>
                                <p class="text-sm text-gray-400">Jan 2022 - Dec 2022</p>
                                <ol class="ms-2 list-inside list-disc">
                                    <li>Menciptakan solusi desain yang inovatif dan menarik.</li>
                                    <li>Mengembangkan persona pengguna berdasarkan data riset.</li>
                                    <li>Mengumpulkan umpan balik dari pengguna dan pemangku kepentingan.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>

                {{-- Logout Button --}}
                <div class="mx-14 flex items-center justify-between p-6 ps-0 sm:p-0">
                    <div class="">
                        <a
                            href="{{ route('editprofile') }}"
                            class="text-md rounded-full bg-cyan px-8 py-4 text-white hover:bg-white hover:text-cyan"
                        >
                            Edit Profile
                        </a>
                    </div>
                    <button class="rounded-full bg-red-500 p-3 text-white shadow-lg hover:bg-red-600">
                        <svg
                            class="h-10 w-10 sm:h-14 sm:w-14"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
