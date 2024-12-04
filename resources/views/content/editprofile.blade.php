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
                                        class="scrollbar-modal relative my-14 max-h-96 overflow-y-auto rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                        <!-- Modal body -->
                                        <div class="flex items-start justify-end">
                                            <button data-modal-hide="crud-modal2" class="z-10 p-2 pe-0">
                                                <svg class="h-6 w-6 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('alumni.create-experiences') }}" method="POST">
                                            @csrf
                                            <div class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                <div class="col-span-2">
                                                    <label for="company"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Company</label>
                                                    <select type="text" name="company" id="company"
                                                        class="block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                        placeholder="" required="">
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id_company }}">
                                                                {{ $company->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('company')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="position"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                    <input type="text" name="position" id="position"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="" required="">
                                                    @error('position')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="date_start"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Start
                                                        Date</label>
                                                    <input type="date" name="date_start" id="date_start"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="Enter start date" required>
                                                    @error('date_start')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="date_end"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">End
                                                        Date</label>
                                                    <input type="date" name="date_end" id="date_end"
                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                        placeholder="Enter end date">
                                                    <p class="mt-1 text-sm text-gray-400">Empty the field if its still
                                                        Active</p>

                                                    @error('date_end')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-span-2">
                                                    <label for="responsibility"
                                                        class="mb-2 block text-sm text-gray-400">Responsibility</label>
                                                    <div id="responsibility-container-create">
                                                        <!-- The initial responsibility item -->
                                                        <div class="responsibility-item mb-2 flex items-center">
                                                            <input type="text" name="job_responsibility[]"
                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                placeholder="Enter responsibility" required />
                                                            <button type="button"
                                                                class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                style="display: none;">Remove</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" id="add-responsibility-create"
                                                        class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                        Add Responsibility
                                                    </button>
                                                    @error('job_responsibility')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button data-modal-hide="crud-modal" type="submit"
                                                class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                                Save Changes
                                            </button>
                                        </form>
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
                                    <button data-modal-target="crud-modal-{{ $job->id_tracking }}"
                                        data-modal-toggle="crud-modal-{{ $job->id_tracking }}"
                                        class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                        <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                        </svg>
                                    </button>
                                    <!-- Main modal -->
                                    <div id="crud-modal-{{ $job->id_tracking }}" tabindex="-1" aria-hidden="true"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                            <!-- Modal content -->
                                            <div
                                                class="scrollbar-modal relative my-14 max-h-96 overflow-y-auto rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                                <!-- Modal body -->
                                                <div class="flex items-start justify-end">
                                                    <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                        class="z-10 p-2 pe-0">
                                                        <svg class="h-6 w-6 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('alumni.update-experiences', ['id' => $job->id_tracking]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div
                                                        class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                        <div class="col-span-2">
                                                            <label for="company"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Company</label>
                                                            <select type="text" name="company" id="company"
                                                                class="block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                                placeholder="{{ $job->company_name }}" required="">
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->id_company }}"
                                                                        {{ $company->company_name == $job->company_name ? 'selected' : '' }}>
                                                                        {{ $company->company_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('company')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="position"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                            <input type="text" name="position" id="position"
                                                                class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                                placeholder="" required=""
                                                                value="{{ $job->job_name }}">
                                                            @error('position')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="date_start"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Start
                                                                Date</label>
                                                            <input type="date" name="date_start" id="date_start"
                                                                class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                                placeholder="Enter start date"
                                                                value="{{ old('date_start') }}" required>
                                                            @error('date_start')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="date_end"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">End
                                                                Date</label>
                                                            <input type="date" name="date_end" id="date_end"
                                                                class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow"
                                                                placeholder="Enter end date"
                                                                value="{{ old('date_end') }}">
                                                            <p class="mt-1 text-sm text-gray-400">Empty the field if its
                                                                still Active</p>
                                                            @error('date_end')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        @if (is_array($job->job_description) && !empty($job->job_description))
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-gray-400">Responsibility</label>
                                                                <div
                                                                    id="responsibility-container-update-{{ $job->id_tracking }}">
                                                                    @foreach ($job->job_description as $responsibility)
                                                                        <div
                                                                            class="responsibility-item mb-2 flex items-center">
                                                                            <input type="text"
                                                                                name="job_responsibility[]"
                                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                                value="{{ $responsibility }}"
                                                                                placeholder="Enter responsibility"
                                                                                required />
                                                                            <button type="button"
                                                                                class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                                style="display: none;">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <button type="button"
                                                                    id="add-responsibility-update-{{ $job->id_tracking }}"
                                                                    class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-gray-400">Responsibility</label>
                                                                <div
                                                                    id="responsibility-container-update-{{ $job->id_tracking }}">
                                                                    <div
                                                                        class="responsibility-item mb-2 flex items-center">
                                                                        <input type="text" name="job_responsibility[]"
                                                                            class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                            placeholder="Enter responsibility" required />
                                                                        <button type="button"
                                                                            class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                            style="display: none;">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                    id="add-responsibility-update-{{ $job->id_tracking }}"
                                                                    class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                        type="submit"
                                                        class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                                        Save Changes
                                                    </button>
                                                </form>
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
                                            @endif
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        @endforeach
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
        document.addEventListener('DOMContentLoaded', () => {
            // Variables for create modal
            const responsibilityContainerCreate = document.getElementById('responsibility-container-create');
            const addButtonCreate = document.getElementById('add-responsibility-create');
            const maxResponsibilities = 3; // Set maximum number of responsibilities

            // Function to handle "Remove" button clicks
            const handleRemoveClick = (e) => {
                if (e.target.classList.contains('remove-responsibility')) {
                    // Remove the parent responsibility item when "Remove" is clicked
                    e.target.closest('.responsibility-item').remove();

                    // Re-add the "Add Responsibility" button if it was removed
                    if (!addButtonCreate.parentNode && responsibilityContainerCreate.children.length <
                        maxResponsibilities) {
                        responsibilityContainerCreate.parentNode.appendChild(addButtonCreate);
                    }
                }
            };

            // Add event delegation for pre-populated and dynamically added "Remove" buttons
            responsibilityContainerCreate.addEventListener('click', handleRemoveClick);

            // Add new responsibility input field when "Add Responsibility" button is clicked
            addButtonCreate.addEventListener('click', () => {
                // Check if the limit has been reached
                if (responsibilityContainerCreate.children.length >= maxResponsibilities) {
                    return; // Do not add more fields
                }

                // Create a new responsibility field with a "Remove" button
                const newItem = document.createElement('div');
                newItem.classList.add('responsibility-item', 'mb-2', 'flex', 'items-center');
                newItem.innerHTML = `
                <input type="text" name="job_responsibility[]"
                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                    placeholder="Enter Responsibility" required />
                <button type="button" class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">
                    Remove
                </button>
            `;

                // Append the new responsibility field to the container
                responsibilityContainerCreate.appendChild(newItem);

                // Hide the "Add Responsibility" button if the limit is reached
                if (responsibilityContainerCreate.children.length >= maxResponsibilities) {
                    addButtonCreate.remove();
                }
            });
        });

        // Update Forms
        document.addEventListener('DOMContentLoaded', () => {
            const modals = document.querySelectorAll('[id^="crud-modal-"]');

            modals.forEach((modal) => {
                const trackingId = modal.id.split('-').pop(); // Extract the unique ID
                const responsibilityContainerUpdate = document.getElementById(
                    `responsibility-container-update-${trackingId}`
                );
                const addButtonUpdate = document.getElementById(`add-responsibility-update-${trackingId}`);
                const maxResponsibilities = 3; // Set maximum number of responsibilities

                if (!responsibilityContainerUpdate || !addButtonUpdate) return;

                // Hide "Add Responsibility" button initially if the limit is already reached
                if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                    addButtonUpdate.style.display = 'none';
                }

                // Function to handle "Remove" button clicks
                const handleRemoveClick = (e) => {
                    if (e.target.classList.contains('remove-responsibility')) {
                        // Remove the parent responsibility item when "Remove" is clicked
                        e.target.closest('.responsibility-item').remove();

                        // Show the "Add Responsibility" button if it was hidden
                        if (responsibilityContainerUpdate.children.length < maxResponsibilities) {
                            addButtonUpdate.style.display = 'inline-block';
                        }
                    }
                };

                // Add event delegation for pre-populated and dynamically added "Remove" buttons
                responsibilityContainerUpdate.addEventListener('click', handleRemoveClick);

                // Add new responsibility input field when "Add Responsibility" button is clicked
                addButtonUpdate.addEventListener('click', () => {
                    // Check if the limit has been reached
                    if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                        return; // Do not add more fields
                    }

                    // Create a new responsibility field with a "Remove" button
                    const newItem = document.createElement('div');
                    newItem.classList.add('responsibility-item', 'mb-2', 'flex', 'items-center');
                    newItem.innerHTML = `
                    <input type="text" name="job_responsibility[]"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                        placeholder="Enter Responsibility" required />
                    <button type="button" class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">
                        Remove
                    </button>
                `;

                    // Append the new responsibility field to the container
                    responsibilityContainerUpdate.appendChild(newItem);

                    // Hide the "Add Responsibility" button if the limit is reached
                    if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                        addButtonUpdate.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
