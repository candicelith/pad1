@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="w-full max-w-none rounded-3xl bg-lightblue shadow-lg">
                {{-- Profile Image & Banner --}}
                <div class="relative">
                    <div class="h-48 rounded-t-3xl bg-cyan-100"></div>
                    <div class="absolute top-1/2 ms-14">
                        <div class="relative">
                            <img class="h-48 w-48 rounded-full object-cover"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Profile Picture" />
                            {{-- Camera Icon --}}
                            <div
                                class="absolute bottom-0 ms-40 flex h-14 w-14 items-center justify-center rounded-full bg-cyan p-3 hover:bg-cyan-100 sm:ms-48 sm:h-16 sm:w-16">
                                <svg class="h-8 w-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z" />
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-28 flex flex-col space-y-2 sm:mx-14">
                    <form action="#">
                        <div class="px-10">
                            <div class="mb-5 mt-5">
                                <label for="full_name" class="mb-2 block text-xl text-cyan">Full Name</label>
                                <input type="text" id="full_name"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                    required value="{{ $userDetails->name }}" />
                            </div>
                            <div class="mb-5 mt-5">
                                <label for="current_company" class="mb-2 block text-xl text-cyan">
                                    Current Company
                                </label>

                                {{-- <button id="dropdownOffsetButton" data-dropdown-toggle="dropdownSkidding"
                                    data-dropdown-offset-distance="-710" data-dropdown-offset-skidding="100"
                                    data-dropdown-placement="right"
                                    class="flex w-full items-center justify-between rounded-full border border-gray-900 bg-gray-50 p-1 px-6 py-2.5 text-sm text-gray-900"
                                    type="button">
                                    <span class="text-gray-400">Current Company</span>
                                    <svg class="ml-2 h-2 w-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownSkidding"
                                    class="z-10 hidden w-full max-w-screen-lg divide-y divide-gray-100 rounded-lg border border-gray-900 bg-gray-50 shadow dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownOffsetButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bank
                                                Central Asia</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tokopedia</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Shopee</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Traveloka</a>
                                        </li>
                                    </ul>
                                </div> --}}


                                {{-- <input type="text" id="current_company"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                    required value="{{ $userDetails->current_company }}" /> --}}

                                <select name="current_company" id="current_company"
                                    class="block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900">
                                    <option value="" disabled {{ $userDetails->current_job ? '' : 'selected' }}>Select a company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id_company }}"
                                            {{ old('company') == $company->id_company ? 'selected' : '' }}>
                                            {{ $company->company_name }}
                                        </option>
                                    @endforeach
                            </div>
                            <div class="mb-5 mt-5">
                                <label for="current_job" class="mb-2 block text-xl text-cyan">
                                    Current Position
                                </label>
                                <input type="text" id="current_job"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                    required value="{{ $userDetails->current_job }}" />
                            </div>
                            <div class="mb-5 mt-5">
                                <label for="user_description" class="mb-2 block text-xl text-cyan">About</label>
                                <textarea type="text" id="user_description"
                                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900">{{ $userDetails->user_description }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- // Experiences --}}
                {{-- <div class="mb-5 mt-5">
                    <label for="experience" class="mb-2 block text-xl text-cyan">Experience</label>
                    <!-- Flex container for the form and button -->
                    <div id="experience-container" class="flex flex-wrap gap-10">
                        <!-- Existing Forms -->
                    @foreach ($jobDetails as $job)
                    <form action="{{ route('alumni.store') }}" method="POST">
                        <div class="experience-form rounded-lg bg-gray-300 p-2.5 sm:w-80 sm:p-5">
                            <div class="my-2.5">
                                <label for="company" class="mb-2 block text-base text-gray-500">
                                    Company
                                </label>
                                <input type="text" id="company" value="{{ $job->company_name }}"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                            </div>
                            <div class="my-2.5">
                                <label for="position" class="mb-2 block text-base text-gray-500">
                                    Position
                                </label>
                                <input type="text" id="position" value="{{ $job->job_name }}"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                            </div>
                            <div class="my-2.5">
                                <label for="period" class="mb-2 block text-base text-gray-500">
                                    Period of Time
                                </label>
                                <input type="text" id="period_of_time" value="{{ $job->date_start }} - {{ $job->date_end }}"
                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                            </div>
                            <div class="my-2.5">
                                <label for="responsibilities" class="mb-2 block text-base text-gray-500">
                                    Responsibilities
                                </label>
                                <textarea cols="30" rows="10"
                                    class="block w-full rounded-lg border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                            </div>
                        </div>
                    </form>
                    @endforeach
                        <!-- Button to toggle/add forms -->
                        <div id="add-button-container" class="flex w-80 flex-col">
                            <button type="button" id="add-experience-btn"
                                class="flex h-1/2 items-center justify-center rounded-lg bg-gray-300 p-5 text-lg text-gray-500"
                                onclick="addExperienceForm()">
                                <svg class="me-2 h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                Add Experience
                            </button>
                        </div>
                    </div>
                </div> --}}

                {{-- Logout and Save Button --}}
                <div class="mx-4 mt-14 flex items-center justify-between p-6 ps-0 sm:mx-14 sm:p-0">
                    <div class="sm:ms-14">
                        <a {{-- ganti ntar --}} href="{{ route('editprofile') }}"
                            class="sm:text-md rounded-full bg-cyan px-4 py-4 text-sm text-white hover:bg-white hover:text-cyan sm:px-8">
                            Save Changes
                        </a>
                    </div>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="rounded-full bg-red-500 p-3 text-white shadow-lg hover:bg-red-600 sm:me-10">
                        <svg class="h-8 w-8 sm:h-14 sm:w-14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1">
                            </path>
                        </svg>
                    </button>
                    <div id="popup-modal" tabindex="-1"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                        <div class="relative max-h-full w-full max-w-md p-4">
                            <div class="relative rounded-lg bg-cyan-100 shadow">
                                <div class="p-4 text-center md:p-5">
                                    <h3 class="mb-5 text-lg font-normal text-white">Are you leaving?</h3>
                                    <p class="mb-5 text-sm font-normal text-white">Are you sure you want to Log Out?</p>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="inline-flex items-center rounded-full border border-gray-900 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                        Cancel
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
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

    {{-- Logout Button Script --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
    </form>

    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });
    </script>
    <script>
        let formCount = 0; // Initialize a variable to count the forms

        function addExperienceForm() {
            // Create a new form container
            const newFormContainer = document.createElement('div');
            newFormContainer.className = 'experience-form w-80 rounded-lg bg-gray-300 p-5';

            // Create form fields
            newFormContainer.innerHTML = `
                <div class="my-2.5">
                    <label for="company-${formCount}" class="mb-2 block text-base text-gray-500">Company</label>
                    <input type="text" id="company-${formCount}" class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                </div>
                <div class="my-2.5">
                    <label for="position-${formCount}" class="mb-2 block text-base text-gray-500">Position</label>
                    <input type="text" id="position-${formCount}" class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                </div>
                <div class="my-2.5">
                    <label for="period_of_time-${formCount}" class="mb-2 block text-base text-gray-500">Period of Time</label>
                    <input type="text" id="period_of_time-${formCount}" class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900" />
                </div>
                <div class="my-2.5">
                    <label for="responsibilities-${formCount}" class="mb-2 block text-base text-gray-500">Responsibilities</label>
                    <textarea cols="30" rows="10" class="block w-full rounded-lg border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                </div>
            `;

            // Append the new form to the experience container
            const experienceContainer = document.getElementById('experience-container');
            experienceContainer.insertBefore(newFormContainer, document.getElementById('add-button-container'));

            // Increment the form count
            formCount++;
        }
    </script>
@endsection
