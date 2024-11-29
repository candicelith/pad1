@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="w-full max-w-none rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                <div class="mx-10 flex flex-col space-y-2 py-5 sm:mx-14 sm:py-10">
                    <div class="flex flex-col sm:flex-row-reverse">
                        <div class="mb-2 flex justify-end sm:mb-0">
                            {{-- Add Button --}}
                            <button data-modal-target="crud-modal2" data-modal-toggle="crud-modal2"
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="crud-modal2" tabindex="-1" aria-hidden="true"
                                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                    <!-- Modal content -->
                                    <div
                                        class="relative my-14 rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                        <!-- Modal body -->
                                        <form class="">
                                            <div class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                <div class="col-span-2">
                                                    <label for="company"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Company</label>
                                                    <input type="text" name="company" id="company"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="position"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                    <input type="text" name="position" id="position"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="period_of_time"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Period
                                                        of Time</label>
                                                    <input type="text" name="period_of_time" id="period_of_time"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="responsibilities"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Responsibilities</label>
                                                    <textarea id="responsibilities" rows="4"
                                                        class="block w-full rounded-lg border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow" placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <button data-modal-hide="crud-modal" type="submit"
                                            class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="-mt-8 mb-4 flex justify-start text-center sm:-mt-10 sm:text-start">
                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                        </div>
                    </div>
                @if ($jobDetails && count($jobDetails) > 0)
                @foreach ($jobDetails as $job)
                    <div class="flex flex-col sm:flex-row-reverse">
                        <div class="mb-2 flex justify-end sm:mb-0">
                            {{-- Edit Button --}}
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                    <!-- Modal content -->
                                    <div
                                        class="relative my-14 rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                        <!-- Modal body -->
                                        <form class="">
                                            <div class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                <div class="col-span-2">
                                                    <label for="company"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Company</label>
                                                    <input type="text" name="company" id="company"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="position"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                    <input type="text" name="position" id="position"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="period_of_time"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Period
                                                        of Time</label>
                                                    <input type="text" name="period_of_time" id="period_of_time"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="responsibilities"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Responsibilities</label>
                                                    <textarea id="responsibilities" rows="4"
                                                        class="block w-full rounded-lg border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <button data-modal-hide="crud-modal" type="submit"
                                            class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ol class="relative -mt-12 list-none sm:-mt-12">
                                <li class="mb-10">
                                    <h3 class="text-lg text-cyan sm:text-xl">
                                        {{ $job->job_name }}
                                    </h3>
                                    <h3 class="text-base text-cyan sm:text-lg">
                                        {{ $job->company_name }}
                                    </h3>
                                    <p class="text-xs text-gray-400 sm:text-sm">
                                        {{ $job->date_start }}
                                        -
                                        {{ $job->date_end }}
                                    </p>
                                    <ol class="ms-4 list-outside list-disc text-sm text-cyan sm:text-base">
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
                @endif
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

        // Save Button Script
        function triggerAlert() {
            sessionStorage.setItem('showAlert', 'true');
        }
    </script>
@endsection
