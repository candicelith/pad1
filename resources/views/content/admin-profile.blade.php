@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-16 sm:ms-60">
            <div class="mx-auto ms-4 mt-14 flex max-w-screen-xl items-start px-4 py-8">
                <div class="w-full max-w-none rounded-3xl bg-lightblue shadow-lg">

                    {{-- Profile Image & Banner --}}
                    <div class="relative">
                        <div class="h-48 rounded-t-3xl bg-cyan-100"></div>
                        <div class="absolute top-1/2 ms-14">
                            <img class="h-48 w-48 rounded-full object-cover"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Profile Picture" />
                        </div>
                    </div>

                    {{-- Profile Details --}}
                    <div class="ms-14 flex flex-col items-start pt-36">
                        <h2 class="text-2xl text-cyan">Muhammad Naufal Daffachri</h2>
                        <p class="pt-5 text-xl text-gray-400">Admin</p>
                    </div>

                    {{-- Logout Button --}}
                    <div data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="flex justify-end p-6 sm:p-0">
                        <button class="rounded-full bg-red-500 p-3 text-white shadow-lg hover:bg-red-600">
                            <svg class="h-10 w-10 sm:h-14 sm:w-14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1" />
                            </svg>
                        </button>
                    </div>

                    {{-- Modal --}}
                    <div id="popup-modal" tabindex="-1"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                        <div class="relative max-h-full w-full max-w-md p-4">
                            <div class="relative rounded-lg bg-cyan-100 shadow">
                                <div class="p-4 text-center md:p-5">
                                    <h3 class="mb-5 text-lg font-normal text-white">Are you leaving?</h3>
                                    <p class="mb-5 text-sm font-normal text-white">Are you sure you want to Log Out?</p>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                        Cancel
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                        Log Out
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
