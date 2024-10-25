@extends('layout.headerFooter')

@section('content')

<section class="bg-white mt-20">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="bg-lightblue rounded-3xl shadow-lg w-full max-w-none">
            <!-- Profile Image & Banner -->
            <div class="relative">
                <div class="bg-cyan-100 h-48 rounded-t-3xl"></div>
                <div class="absolute top-1/2 ms-14">
                    <img class="w-48 h-48 rounded-full object-cover" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Profile Picture">
                </div>
            </div>

            <!-- Profile Details -->
            <div class="pt-36 flex flex-col items-start ms-14">
                <h2 class="text-2xl text-cyan">Muhammad Naufal Daffachri</h2>
                <p class="pt-5 text-xl text-gray-400">23/565657/SV/23636</p>
            </div>

            <!-- Logout Button -->
            <div class="flex justify-end p-6 sm:p-0">
                <button class="bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600">
                    <svg class="w-10 sm:w-14 h-10 sm:h-14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
