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
                <div class="ms-14 flex flex-col items-start pt-36">
                    <h2 class="text-2xl text-cyan">Muhammad Naufal Daffachri</h2>
                    <p class="pt-5 text-xl text-gray-400">23/565657/SV/23636</p>
                </div>

                {{-- Logout Button --}}
                <div class="flex justify-end p-6 sm:p-0">
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
