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
                            src="{{ $userDetails->profile_photo }}"
                            alt="Profile Picture"
                        />
                    </div>
                </div>

                {{-- Profile Details --}}
                <div class="mx-14 flex flex-col space-y-2">
                    <div class="flex items-center justify-between pt-36">
                        <h2 class="text-2xl text-cyan">{{ $userDetails->name }}</h2>
                        <p class="text-xl text-gray-400">{{ $userDetails->nim }}</p>
                    </div>
                    <h3 class="text-lg text-cyan">{{ $userDetails->job_name }} <br>
                        {{ $userDetails->company_name }}</h3>
                    <div class="flex flex-col space-y-2 pt-5">
                        <h4 class="text-xl text-cyan">About</h4>
                        <p class="text-md text-justify text-cyan">
                            {{ $userDetails->user_description }}
                        </p>
                    </div>
                    <div class="flex flex-col space-y-2 pt-5">
                        <h4 class="text-xl text-cyan">Experience</h4>
                        <ol class="relative ms-4 border-s border-gray-900">
                            @foreach ($jobDetails as $job)
                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900"
                                    ></div>
                                    <h3 class="text-xl text-cyan">{{ $job->job_name }}</h3>
                                    <h3 class="text-lg text-cyan">{{ $job->company_name }}</h3>
                                    <p class="text-sm text-gray-400">{{ $job->date_start }} - {{ $job->date_end }}</p>
                                    <ol class="ms-2 list-inside list-disc">
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
                    </div>
                </div>

                {{-- Logout Button --}}
                <div class="mx-14 flex items-center justify-between p-6 ps-0 sm:p-0">
                    <div class="">
                        <a
                            href="{{ route('alumni.show-profile') }}"
                            class="text-md rounded-full bg-cyan px-8 py-4 text-white hover:bg-white hover:text-cyan"
                        >
                            Edit Profile
                        </a>
                    </div>
                    <button
                        class="rounded-full bg-red-500 p-3 text-white shadow-lg hover:bg-red-600"
                        id="logout-button"
                    >
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

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>

                <script>
                    document.getElementById('logout-button').addEventListener('click', function () {
                        document.getElementById('logout-form').submit();
                    });
                </script>
            </div>
        </div>
    </section>
@endsection
