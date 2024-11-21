@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div id="alert-3"
            class="alert-animation mx-auto mb-4 hidden w-1/2 -translate-y-10 transform rounded-lg bg-lightblue-100 p-4 text-center text-sm text-cyan opacity-0"
            role="alert">
            <span>Perubahan data sedang dalam proses verifikasi oleh admin.<br>Mohon tunggu
                konfirmasi lebih
                lanjut.</span>
        </div>
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="w-full max-w-none rounded-3xl bg-lightblue shadow-lg">
                {{-- Profile Image & Banner --}}
                <div class="relative">
                    <div class="h-48 rounded-t-3xl bg-cyan-100"></div>
                    <div class="absolute top-1/2 ms-14">
                        <img class="h-48 w-48 rounded-full object-cover" src="{{ $userDetails->profile_photo }}"
                            alt="Profile Picture" />
                    </div>
                </div>

                {{-- Profile Details --}}
                <div class="mx-10 flex flex-col space-y-2">
                    <div class="items-center justify-between pt-36 sm:flex">
                        <h2 class="text-center text-xl text-cyan sm:text-start sm:text-2xl">{{ $userDetails->name }}</h2>
                        <p class="text-center text-lg text-gray-400 sm:text-start sm:text-xl">{{ $userDetails->nim }}</p>
                    </div>
                    <h3 class="text-center text-base text-cyan sm:text-start sm:text-lg">{{ $userDetails->job_name }} <br>
                        {{ $userDetails->company_name }}</h3>
                    @if (!empty($userDetails->user_description))
                        <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                        <p class="text-justify text-sm text-cyan sm:text-base">
                            {{ $userDetails->user_description }}
                        </p>
                    @endif
                    <div class="flex flex-col space-y-2 pt-5">
                        <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                        @if ($jobDetails && count($jobDetails) > 0)
                            <ol class="relative ms-4 border-s border-gray-900">
                                @foreach ($jobDetails as $job)
                                    <li class="mb-10 ms-4">
                                        <div
                                            class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                        </div>
                                        <h3 class="text-lg text-cyan sm:text-xl">{{ $job->job_name }}</h3>
                                        <h3 class="text-base text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                            {{ $job->date_end }}</p>
                                        <ol class="ms-4 list-outside list-disc text-sm sm:text-base">
                                            @if (is_array($job->job_description))
                                                @foreach ($job->job_description as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @else
                                                <li>{{ $job->job_description }}</li>
                                            @endif
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>

                <div class="mx-4 mt-10 flex items-center justify-between p-6 ps-0 sm:mx-14 sm:p-0">
                    {{-- Edit Button --}}
                    <div class="sm:ms-14">
                        <a href="{{ route('alumni.show-profile') }}"
                            class="sm:text-md rounded-full bg-cyan px-8 py-4 text-sm text-white hover:bg-white hover:text-cyan">
                            Edit Profile
                        </a>
                    </div>
                    {{-- Logout Button --}}
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="rounded-full bg-red-600 p-3 text-white shadow-lg hover:bg-red-400 sm:me-10">
                        <svg class="h-8 w-8 sm:h-14 sm:w-14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1" />
                        </svg>
                    </button>

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
                                    <button data-modal-hide="popup-modal" type="button" id="logout-button"
                                        class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                        Log Out

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>

                <script>
                    document.getElementById('logout-button').addEventListener('click', function() {
                        document.getElementById('logout-form').submit();
                    });
                </script>
            </div>
        </div>
    </section>

    <script>
        // Alert Script
        if (sessionStorage.getItem('showAlert') === 'true') {
            const alertElement = document.getElementById('alert-3');

            // Delay to make sure the alert appears with animation
            setTimeout(function() {
                alertElement.classList.remove('hidden', '-translate-y-10',
                    'opacity-0'); // Remove initial hidden and translate classes
                alertElement.classList.add('translate-y-2', 'opacity-100',
                    'block'); // Add animation classes to slide in and make visible
            }, 500); // 100ms delay to trigger the animation after the page load

            // Remove the sessionStorage item so it doesn't show again
            sessionStorage.removeItem('showAlert');
        }
    </script>
@endsection
