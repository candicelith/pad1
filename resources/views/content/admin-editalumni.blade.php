@extends('layout.admin-headerNav')

@section('admincontent')
    <section class="mt-20 bg-white">
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

                @if (Session::has('info'))
                    <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightblue-100 p-4 text-center text-sm text-cyan opacity-100 transition-opacity duration-500 sm:w-1/2"
                        role="alert">
                        {!! Session::get('info') !!}
                    </div>
                @endif
                <div class="w-full max-w-none rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                    <div class="mx-10 flex flex-col space-y-2 py-5 sm:mx-14 sm:py-10">

                        <div class="flex flex-col sm:flex-row-reverse">
                            <div class="mb-2 flex justify-end sm:mb-0">
                                {{-- Add Button --}}
                                <button data-modal-target="crud-modal2" data-modal-toggle="crud-modal2"
                                    data-tooltip-target="tooltip-add-experience"
                                    class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                    <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                </button>

                                {{-- Tooltip --}}
                                <div id="tooltip-add-experience" role="tooltip"
                                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                    Add Experience
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <!-- Main modal -->
                                <div id="crud-modal2" tabindex="-1" aria-hidden="true"
                                    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                    <div class="relative max-h-full w-full max-w-5xl p-4">
                                        <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                            <div
                                                class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                                <h3 class="text-2xl text-cyan sm:text-start">
                                                    Add Your New Experience!
                                                </h3>
                                                <button type="button" class="inline-flex items-center"
                                                    data-modal-hide="crud-modal2">
                                                    <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="3"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                </button>
                                            </div>

                                            {{-- Main Experience Form --}}
                                            <form
                                                class="scrollbar-modal max-h-[calc(100vh-12rem)] overflow-y-auto p-4 md:p-5"
                                                action="{{ route('admin.edit-alumni.add-experiences', ['id' => $userDetails->id_userDetails]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

                                                    {{-- COMPANY SELECTION & NEW COMPANY FORM AREA --}}
                                                    <div class="col-span-2" x-data="experienceCompanyHandler(
                                                        @js($companies->map(fn($c) => ['value' => $c->id_company, 'label' => $c->company_name])),
                                                        '{{ old('company') }}'
                                                    )">
                                                        <label for="company_dropdown_input"
                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                            Company <span
                                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                        </label>

                                                        <div class="relative w-full">
                                                            <input x-model="search" id="company_dropdown_input"
                                                                @focus="open = true; showCompanyForm = false"
                                                                @input.debounce.300ms="filterOptions"
                                                                @keydown.escape="open = false" @click.away="open = false"
                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-6 py-2 text-sm text-gray-900 focus:outline-none"
                                                                placeholder="Search or select a company"
                                                                autocomplete="off" />

                                                            <ul x-show="open" x-transition
                                                                class="absolute z-20 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow-lg">
                                                                <template x-for="item in filteredOptions"
                                                                    :key="item.value">
                                                                    <li @click="selectOption(item)"
                                                                        class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-100"
                                                                        x-text="item.label">
                                                                    </li>
                                                                </template>
                                                                <li @click="toggleNewCompanyForm()"
                                                                    class="text-cyan-600 cursor-pointer border-t px-4 py-2 text-sm font-semibold hover:bg-gray-100">
                                                                    + Add a new company
                                                                </li>
                                                            </ul>
                                                            {{-- This hidden input is CRUCIAL. It holds the selected company_id for the main experience form --}}
                                                            <input type="hidden" name="company"
                                                                :value="selectedOption?.value" required>
                                                        </div>
                                                        @error('company')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror

                                                        {{-- Inline New Company Form (Initially Hidden) --}}
                                                        <div x-show="showCompanyForm" x-transition
                                                            class="col-span-2 mt-4 space-y-4 rounded-xl border border-gray-400 bg-gray-100 p-4">
                                                            <h4 class="mb-3 text-lg font-semibold text-cyan">Create New
                                                                Company
                                                            </h4>
                                                            <div id="new_company_ajax_errors_modal-_create"
                                                                class="company-logo-error mb-3 text-sm text-red-500"></div>
                                                            {{-- Unique ID --}}

                                                            <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                                <div
                                                                    class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-50">
                                                                    <img id="new_company_logo_preview_modal-_create"
                                                                        class="h-full w-full object-cover"
                                                                        src="{{ asset('assets/placeholder.png') }}"
                                                                        alt="Logo Preview">
                                                                </div>
                                                                <label for="new_company_logo_modal-_create"
                                                                    class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md">
                                                                    <svg class="h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M9 5h6l-1 4" />
                                                                    </svg>
                                                                </label>
                                                                <input type="file" id="new_company_logo_modal-_create"
                                                                    class="hidden" onchange="checkFileSize(this)"
                                                                    @change="previewLogo($event, 'new_company_logo_preview_modal-_create')">
                                                            </div>
                                                            <div>
                                                                <label for="new_company_name_modal-_create"
                                                                    class="mb-1 block text-sm text-gray-700">Name <span
                                                                        class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                <input type="text" id="new_company_name_modal-_create"
                                                                    class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                            </div>
                                                            <div>
                                                                <label for="new_company_field_modal-_create"
                                                                    class="mb-1 block text-sm text-gray-700">Industry
                                                                    Type
                                                                    <span
                                                                        class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                <input type="text" id="new_company_field_modal-_create"
                                                                    class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                            </div>
                                                            <div>
                                                                <label for="new_company_address_modal-_create"
                                                                    class="mb-1 block text-sm text-gray-700">Location</label>
                                                                <input type="text"
                                                                    id="new_company_address_modal-_create"
                                                                    class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                            </div>
                                                            <div>
                                                                <label for="new_company_description_modal-_create"
                                                                    class="mb-1 block text-sm text-gray-700">Description
                                                                    <span
                                                                        class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                <textarea id="new_company_description_modal-_create" rows="3"
                                                                    class="w-full rounded-md border-gray-300 bg-gray-50 px-3 py-2 shadow-sm"></textarea>
                                                            </div>
                                                            <div class="md:col-span-3">
                                                                <label for="new_company_gallery_modal-_create"
                                                                    class="block text-sm font-medium text-gray-700">Company
                                                                    Gallery</label>
                                                                <p class="mb-2 text-xs text-gray-500">You can add multiple
                                                                    photos (max 5, each under 2MB).</p>
                                                                <input type="file"
                                                                    name="new_company_gallery_modal-_create[]"
                                                                    id="new_company_gallery_modal-_create" multiple
                                                                    accept="image/*"
                                                                    @change="handleGalleryPreview($event, 'new_company_gallery_preview_modal-_create', 'new_company_gallery_error_modal-_create')"
                                                                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:mr-4 file:rounded-l-lg file:border-0 file:bg-gray-200 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-300 focus:outline-none">
                                                                <p id="new_company_gallery_error_modal-_create"
                                                                    class="mt-1 text-sm text-red-500"></p>
                                                                <div id="new_company_gallery_preview_modal-_create"
                                                                    class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5">
                                                                </div>
                                                            </div>
                                                            <div class="flex space-x-2">
                                                                <button type="button"
                                                                    @click="saveNewCompanyViaAjax('_create')"
                                                                    class="bg-btn-cyan rounded-lg bg-cyan px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan">
                                                                    Save & Select Company
                                                                </button>
                                                                <button type="button" @click="toggleNewCompanyForm()"
                                                                    class="rounded-lg bg-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-400">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- END COMPANY SELECTION --}}


                                                    <div class="col-span-2" x-data="positionDropdown({
                                                        options: [
                                                            { value: '', label: 'Search or select a position' },
                                                            { value: 'Software Engineer', label: 'Software Engineer' },
                                                            { value: 'Product Manager', label: 'Product Manager' },
                                                            { value: 'Data Analyst', label: 'Data Analyst' },
                                                            { value: 'UX Designer', label: 'UX Designer' },
                                                            { value: 'Marketing Specialist', label: 'Marketing Specialist' },
                                                            { value: 'Project Manager', label: 'Project Manager' },
                                                            { value: 'Business Analyst', label: 'Business Analyst' },
                                                            { value: 'Full Stack Developer', label: 'Full Stack Developer' },
                                                            { value: 'Frontend Developer', label: 'Frontend Developer' },
                                                            { value: 'Backend Developer', label: 'Backend Developer' }
                                                        ],
                                                        initialSelectedValue: '{{ old('position') }}'
                                                    })">
                                                        <label for="position_dropdown_input"
                                                            class="mb-2 block text-sm text-cyan sm:text-xl">Position
                                                            <span
                                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                        <div class="relative w-full">
                                                            <input x-model="search" id="position_dropdown_input"
                                                                @focus="open = true" @input="filterOptions"
                                                                @click.away="open = false"
                                                                class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 px-6 text-sm text-gray-900 shadow focus:outline-none"
                                                                placeholder="Search or select a position"
                                                                autocomplete="off" />
                                                            <ul x-show="open"
                                                                class="absolute z-10 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow">
                                                                <template x-for="item in filteredOptions"
                                                                    :key="item.value">
                                                                    <li @click="selectOption(item)"
                                                                        class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-200"
                                                                        x-text="item.label"></li>
                                                                </template>
                                                            </ul>
                                                            <input type="hidden" name="position"
                                                                :value="selectedOption?.value" required>
                                                        </div>
                                                        @error('position')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div date-rangepicker datepicker datepicker-buttons
                                                        datepicker-autoselect-today
                                                        class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <div class="col-span-1">
                                                            <label for="datepicker-range-start"
                                                                class="mb-2 block text-sm text-cyan sm:text-xl">Start
                                                                Date
                                                                <span
                                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                            <div class="relative">
                                                                <div
                                                                    class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                    </svg>
                                                                </div>
                                                                <input id="datepicker-range-start" name="date_start"
                                                                    type="text" value="{{ old('date_start') }}"
                                                                    class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                    placeholder="Select start date" required>
                                                            </div>
                                                            @error('date_start')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-span-1">
                                                            <label for="datepicker-range-end"
                                                                class="mb-2 block text-sm text-cyan sm:text-xl">End
                                                                Date <span x-show="!isCurrentPosition"
                                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                            <div class="space-y-2" x-data="{ isCurrentPosition: {{ old('is_current_position') ? 'true' : 'false' }} }">
                                                                <div class="relative">
                                                                    <div
                                                                        class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="currentColor" viewBox="0 0 20 20">
                                                                            <path
                                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input id="datepicker-range-end" name="date_end"
                                                                        type="text" value="{{ old('date_end') }}"
                                                                        :disabled="isCurrentPosition"
                                                                        :required="!isCurrentPosition"
                                                                        class="date-end-input block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                        placeholder="Select end date">
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="current_position_checkbox"
                                                                        name="is_current_position" type="checkbox"
                                                                        value="1" x-model="isCurrentPosition"
                                                                        @change="if(isCurrentPosition) { document.getElementById('datepicker-range-end').value = ''; }"
                                                                        class="current-job-checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-cyan focus:ring-2 focus:ring-cyan">
                                                                    <label for="current_position_checkbox"
                                                                        class="ms-2 text-sm font-medium text-gray-700">This
                                                                        is
                                                                        my current position</label>
                                                                </div>
                                                            </div>
                                                            @error('date_end')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-span-2">
                                                        <label
                                                            class="mb-2 block text-sm text-cyan sm:text-xl">Responsibility
                                                            <span
                                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                        <div id="responsibility-container-create">
                                                            @forelse (old('job_responsibility', ['']) as $index => $responsibility)
                                                                <div class="responsibility-item mb-2 flex items-center">
                                                                    <input type="text" name="job_responsibility[]"
                                                                        value="{{ $responsibility }}"
                                                                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                        placeholder="Enter responsibility" required />
                                                                    <button type="button"
                                                                        class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                        style="{{ $loop->first && !old('job_responsibility') ? 'display: none;' : 'display: inline-flex;' }}">Remove</button>
                                                                </div>
                                                                @error('job_responsibility.' . $index)
                                                                    <p class="-mt-2 mb-2 text-sm text-red-500">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            @empty
                                                                <div class="responsibility-item mb-2 flex items-center">
                                                                    <input type="text" name="job_responsibility[]"
                                                                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                        placeholder="Enter responsibility" required />
                                                                    <button type="button"
                                                                        class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                        style="display: none;">Remove</button>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <button type="button" id="add-responsibility-create"
                                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan sm:text-base">
                                                            Add Responsibility
                                                        </button>
                                                        @error('job_responsibility')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                        Submit Experience
                                                    </button>
                                                </div>
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
                                            data-tooltip-target="tooltip-edit-experience"
                                            data-modal-toggle="crud-modal-{{ $job->id_tracking }}"
                                            class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                            <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                            </svg>
                                        </button>

                                        {{-- Tooltip --}}
                                        <div id="tooltip-edit-experience" role="tooltip"
                                            class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                            Edit Experience
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                        <!-- Main modal -->
                                        <div id="crud-modal-{{ $job->id_tracking }}" tabindex="-1" aria-hidden="true"
                                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                            <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                                <div
                                                    class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                                    <div
                                                        class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 p-4 md:p-5">
                                                        <h3 class="text-2xl font-semibold text-cyan">
                                                            Edit Experience
                                                        </h3>
                                                        <button type="button"
                                                            data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                            class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900">
                                                            <svg class="h-3 w-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        class="scrollbar-modal max-h-[calc(100vh-12rem)] overflow-y-auto p-4 md:p-5"
                                                        action="{{ route('admin.edit-alumni.update-experiences', ['id' => $job->id_tracking]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

                                                            {{-- COMPANY SELECTION & NEW COMPANY FORM AREA --}}
                                                            <div class="col-span-2" x-data="experienceCompanyHandler(
                                                                @js($companies->map(fn($c) => ['value' => $c->id_company, 'label' => $c->company_name])),
                                                                '{{ old('company', $job->id_company) }}',
                                                                '{{ old('company_name', $job->company_name) }}' // <--- THIS LINE IS NOW FIXED
                                                            )">
                                                                <label
                                                                    for="company_dropdown_input-{{ $job->id_tracking }}"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                    Company <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                                </label>

                                                                <div class="relative w-full">
                                                                    <input x-model="search"
                                                                        id="company_dropdown_input-{{ $job->id_tracking }}"
                                                                        @focus="open = true; showCompanyForm = false"
                                                                        @input.debounce.300ms="filterOptions"
                                                                        @keydown.escape="open = false"
                                                                        @click.away="open = false"
                                                                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-6 py-2 text-sm text-gray-900 focus:outline-none"
                                                                        placeholder="Search or select a company"
                                                                        autocomplete="off" />

                                                                    <ul x-show="open" x-transition
                                                                        class="absolute z-20 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow-lg">
                                                                        <template x-for="item in filteredOptions"
                                                                            :key="item.value">
                                                                            <li @click="selectOption(item)"
                                                                                class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-100"
                                                                                x-text="item.label">
                                                                            </li>
                                                                        </template>
                                                                        <li @click="toggleNewCompanyForm()"
                                                                            class="text-cyan-600 cursor-pointer border-t px-4 py-2 text-sm font-semibold hover:bg-gray-100">
                                                                            + Add a new company
                                                                        </li>
                                                                    </ul>
                                                                    {{-- This hidden input is CRUCIAL. It holds the selected company_id for the main experience form --}}
                                                                    <input type="hidden" name="company"
                                                                        :value="selectedOption?.value" required>
                                                                </div>
                                                                @error('company')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}</p>
                                                                @enderror

                                                                {{-- Inline New Company Form (Initially Hidden) --}}
                                                                <div x-show="showCompanyForm" x-transition
                                                                    class="col-span-2 mt-4 space-y-4 rounded-xl border border-gray-400 bg-gray-100 p-4">
                                                                    <h4 class="mb-3 text-lg font-semibold text-cyan">
                                                                        Create New Company
                                                                    </h4>
                                                                    <div id="new_company_ajax_errors_modal-{{ $job->id_tracking }}"
                                                                        class="company-logo-error mb-3 text-sm text-red-500">
                                                                    </div>
                                                                    {{-- Unique ID --}}

                                                                    <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                                        <div
                                                                            class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-50">
                                                                            <img id="new_company_logo_preview_modal-{{ $job->id_tracking }}"
                                                                                class="h-full w-full object-cover"
                                                                                src="{{ asset('assets/placeholder.png') }}"
                                                                                alt="Logo Preview">
                                                                        </div>
                                                                        <label
                                                                            for="new_company_logo_modal-{{ $job->id_tracking }}"
                                                                            class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md">
                                                                            <svg class="h-4 w-4 sm:h-5 sm:w-5"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2" d="M9 5h6l-1 4" />
                                                                            </svg>
                                                                        </label>
                                                                        <input type="file"
                                                                            id="new_company_logo_modal-{{ $job->id_tracking }}"
                                                                            class="hidden" onchange="checkFileSize(this)"
                                                                            @change="previewLogo($event, 'new_company_logo_preview_modal-{{ $job->id_tracking }}')">
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="new_company_name_modal-{{ $job->id_tracking }}"
                                                                            class="mb-1 block text-sm text-gray-700">Name
                                                                            <span
                                                                                class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                        <input type="text"
                                                                            id="new_company_name_modal-{{ $job->id_tracking }}"
                                                                            class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="new_company_field_modal-{{ $job->id_tracking }}"
                                                                            class="mb-1 block text-sm text-gray-700">Industry
                                                                            Type
                                                                            <span
                                                                                class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                        <input type="text"
                                                                            id="new_company_field_modal-{{ $job->id_tracking }}"
                                                                            class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="new_company_address_modal-{{ $job->id_tracking }}"
                                                                            class="mb-1 block text-sm text-gray-700">Location</label>
                                                                        <input type="text"
                                                                            id="new_company_address_modal-{{ $job->id_tracking }}"
                                                                            class="w-full rounded-full border-gray-300 bg-gray-50 px-4 py-2 shadow-sm">
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="new_company_description_modal-{{ $job->id_tracking }}"
                                                                            class="mb-1 block text-sm text-gray-700">Description
                                                                            <span
                                                                                class="relative top-1 -ms-1 align-baseline text-red-500">*</span></label>
                                                                        <textarea id="new_company_description_modal-{{ $job->id_tracking }}" rows="3"
                                                                            class="w-full rounded-md border-gray-300 bg-gray-50 px-3 py-2 shadow-sm"></textarea>
                                                                    </div>
                                                                    <div class="md:col-span-3">
                                                                        <label
                                                                            for="new_company_gallery_modal-{{ $job->id_tracking }}"
                                                                            class="block text-sm font-medium text-gray-700">Company
                                                                            Gallery</label>
                                                                        <p class="mb-2 text-xs text-gray-500">You can add
                                                                            multiple photos (max 5, each under 2MB).</p>
                                                                        <input type="file"
                                                                            name="new_company_gallery_modal-[]"
                                                                            id="new_company_gallery_modal-{{ $job->id_tracking }}"
                                                                            multiple accept="image/*"
                                                                            @change="handleGalleryPreview($event, 'new_company_gallery_preview_modal-{{ $job->id_tracking }}', 'new_company_gallery_error_modal-{{ $job->id_tracking }}')"
                                                                            class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:mr-4 file:rounded-l-lg file:border-0 file:bg-gray-200 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-300 focus:outline-none">
                                                                        <p id="new_company_gallery_error_modal-{{ $job->id_tracking }}"
                                                                            class="mt-1 text-sm text-red-500"></p>
                                                                        <div id="new_company_gallery_preview_modal-{{ $job->id_tracking }}"
                                                                            class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5">
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex space-x-2">
                                                                        <button type="button"
                                                                            @click="saveNewCompanyViaAjax('{{ $job->id_tracking }}')"
                                                                            class="bg-btn-cyan rounded-lg bg-cyan px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan">
                                                                            Save & Select Company
                                                                        </button>
                                                                        <button type="button"
                                                                            @click="toggleNewCompanyForm()"
                                                                            class="rounded-lg bg-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-400">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- END COMPANY SELECTION --}}


                                                            <div class="col-span-2" x-data="positionDropdown({
                                                                options: [
                                                                    { value: 'Software Engineer', label: 'Software Engineer' },
                                                                    { value: 'Product Manager', label: 'Product Manager' },
                                                                    { value: 'Data Analyst', label: 'Data Analyst' },
                                                                    { value: 'UX Designer', label: 'UX Designer' },
                                                                    { value: 'Marketing Specialist', label: 'Marketing Specialist' },
                                                                    { value: 'Project Manager', label: 'Project Manager' },
                                                                    { value: 'Business Analyst', label: 'Business Analyst' },
                                                                    { value: 'Full Stack Developer', label: 'Full Stack Developer' },
                                                                    { value: 'Frontend Developer', label: 'Frontend Developer' },
                                                                    { value: 'Backend Developer', label: 'Backend Developer' }
                                                                    // Add other positions as needed
                                                                ],
                                                                initialSelectedValue: '{{ old('position', $job->job_name) }}'
                                                            })">
                                                                <label
                                                                    for="position_dropdown_input-{{ $job->id_tracking }}"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">Position
                                                                    <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div class="relative w-full">
                                                                    <input x-model="search"
                                                                        id="position_dropdown_input-{{ $job->id_tracking }}"
                                                                        @focus="open = true" @input="filterOptions"
                                                                        @click.away="open = false"
                                                                        class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 px-6 text-sm text-gray-900 shadow focus:outline-none"
                                                                        placeholder="Search or select a position"
                                                                        autocomplete="off" />
                                                                    <ul x-show="open"
                                                                        class="absolute z-10 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow">
                                                                        <template x-for="item in filteredOptions"
                                                                            :key="item.value">
                                                                            <li @click="selectOption(item)"
                                                                                class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-200"
                                                                                x-text="item.label"></li>
                                                                        </template>
                                                                    </ul>
                                                                    <input type="hidden" name="position"
                                                                        :value="selectedOption?.value" required>
                                                                </div>
                                                                @error('position')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}</p>
                                                                @enderror
                                                            </div>

                                                            <div date-rangepicker datepicker datepicker-buttons
                                                                datepicker-autoselect-today
                                                                class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                                <div class="col-span-1">
                                                                    <label
                                                                        for="datepicker-range-start-{{ $job->id_tracking }}"
                                                                        class="mb-2 block text-sm text-cyan sm:text-xl">Start
                                                                        Date <span
                                                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                    <div class="relative">
                                                                        <div
                                                                            class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                            <svg class="h-4 w-4 text-gray-500"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                            </svg>
                                                                        </div>
                                                                        <input
                                                                            id="datepicker-range-start-{{ $job->id_tracking }}"
                                                                            name="date_start" type="text"
                                                                            value="{{ old('date_start', $job->date_start) }}"
                                                                            class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                            placeholder="Select start date" required>
                                                                    </div>
                                                                    @error('date_start')
                                                                        <p class="mt-1 text-sm text-red-500">
                                                                            {{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-span-1">
                                                                    <div x-data="{ isCurrentPosition: {{ old('is_current_position', $job->date_end == null || $job->date_end == 'Present' ? 'true' : 'false') }} }">
                                                                        <label
                                                                            for="datepicker-range-end-{{ $job->id_tracking }}"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">End
                                                                            Date <span x-show="!isCurrentPosition"
                                                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                        <div class="space-y-2">
                                                                            <div class="relative">
                                                                                <div
                                                                                    class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                                    <svg class="h-4 w-4 text-gray-500"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 20 20">
                                                                                        <path
                                                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                                    </svg>
                                                                                </div>
                                                                                <input
                                                                                    id="datepicker-range-end-{{ $job->id_tracking }}"
                                                                                    name="date_end" type="text"
                                                                                    value="{{ old('date_end', $job->date_end) }}"
                                                                                    :disabled="isCurrentPosition"
                                                                                    :required="!isCurrentPosition"
                                                                                    class="date-end-input block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                                    placeholder="Select end date">
                                                                            </div>
                                                                            <div class="flex items-center">
                                                                                <input
                                                                                    id="current_position_checkbox-{{ $job->id_tracking }}"
                                                                                    name="is_current_position"
                                                                                    type="checkbox" value="1"
                                                                                    x-model="isCurrentPosition"
                                                                                    @change="if(isCurrentPosition) { document.getElementById('datepicker-range-end-{{ $job->id_tracking }}').value = ''; }"
                                                                                    class="current-job-checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-cyan focus:ring-2 focus:ring-cyan">
                                                                                <label
                                                                                    for="current_position_checkbox-{{ $job->id_tracking }}"
                                                                                    class="ms-2 text-sm font-medium text-gray-700">This
                                                                                    is my current
                                                                                    position</label>
                                                                            </div>
                                                                        </div>
                                                                        @error('date_end')
                                                                            <p class="mt-1 text-sm text-red-500">
                                                                                {{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-span-2">
                                                                <label
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">Responsibility
                                                                    <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div
                                                                    id="responsibility-container-edit-{{ $job->id_tracking }}">
                                                                    @php
                                                                        $responsibilities = old(
                                                                            'job_responsibility',
                                                                            is_array($job->job_description)
                                                                                ? $job->job_description
                                                                                : [],
                                                                        );
                                                                    @endphp
                                                                    @forelse ($responsibilities as $index => $responsibility)
                                                                        <div
                                                                            class="responsibility-item mb-2 flex items-center">
                                                                            <input type="text"
                                                                                name="job_responsibility[]"
                                                                                value="{{ $responsibility }}"
                                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                                placeholder="Enter responsibility"
                                                                                required />
                                                                            <button type="button"
                                                                                class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                                style="{{ $loop->first && count($responsibilities) <= 1 ? 'display: none;' : 'display: inline-flex;' }}">Remove</button>
                                                                        </div>
                                                                        @error('job_responsibility.' . $index)
                                                                            <p class="-mt-2 mb-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    @empty
                                                                        <div
                                                                            class="responsibility-item mb-2 flex items-center">
                                                                            <input type="text"
                                                                                name="job_responsibility[]"
                                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                                placeholder="Enter responsibility"
                                                                                required />
                                                                            <button type="button"
                                                                                class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                                style="display: none;">Remove</button>
                                                                        </div>
                                                                    @endforelse
                                                                </div>
                                                                <button type="button"
                                                                    id="add-responsibility-edit-{{ $job->id_tracking }}"
                                                                    class="bg-btn-cyan-100 mt-2 rounded-lg px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan sm:text-base">
                                                                    Add Responsibility
                                                                </button>
                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end border-t-4 border-cyan-100 pt-4">
                                                            <button type="submit"
                                                                class="bg-btn-cyan rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                                Save Changes
                                                            </button>
                                                        </div>
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
                                            <h3 class="text-base text-cyan sm:text-xl">
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
            // Initialize modals dynamically when they open
            document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-toggle');
                    const modal = document.getElementById(modalId);

                    // Reinitialize Select2 inside the modal
                    setTimeout(() => {
                        $(modal).find('.company-select, .position-select').select2({
                            placeholder: "Search or select",
                            allowClear: true,
                            width: '100%',
                            dropdownCssClass: 'rounded-xl',
                            tags: true
                        });
                    }, 100);
                });
            });
            // Current job checkbox functionality
            const currentJobCheckboxes = document.querySelectorAll('.current-job-checkbox');

            currentJobCheckboxes.forEach(checkbox => {
                const endDateInput = checkbox.closest('.space-y-2').querySelector('.date-end-input');

                // Set initial state
                if (checkbox.checked) {
                    endDateInput.value = 'Present';
                    endDateInput.disabled = true;
                    endDateInput.classList.add('bg-gray-100');
                }

                // Handle checkbox change
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // If checked, disable end date input and set value to "Present"
                        endDateInput.value = 'Present';
                        endDateInput.disabled = true;
                        endDateInput.classList.add('bg-gray-100');
                    } else {
                        // If unchecked, enable end date input and clear value
                        endDateInput.value = '';
                        endDateInput.disabled = false;
                        endDateInput.classList.remove('bg-gray-100');
                    }
                });
            });

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
                    `responsibility-container-edit-${trackingId}`
                );
                const addButtonUpdate = document.getElementById(`add-responsibility-edit-${trackingId}`);
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

        function dropdown({
            options
        }) {
            return {
                open: false,
                search: '',
                options,
                filteredOptions: options,
                selected: null,

                filterOptions() {
                    const term = this.search.toLowerCase();
                    this.filteredOptions = this.options.filter(o => o.label.toLowerCase().includes(term));
                },

                selectOption(option) {
                    this.selected = option;
                    this.search = option.label;
                    this.open = false;
                }
            }
        }

        function handleGalleryPreview(event, previewContainerId, errorContainerId) {
            const previewContainer = document.getElementById(previewContainerId);
            const errorElement = document.getElementById(errorContainerId);
            const files = event.target.files;

            previewContainer.innerHTML = '';
            errorElement.textContent = '';

            if (!files.length) return;

            if (files.length > 5) {
                errorElement.textContent = 'You can only upload a maximum of 5 images.';
                event.target.value = '';
                return;
            }

            const maxFileSize = 2 * 1024 * 1024; // 2MB

            for (const file of files) {
                if (file.size > maxFileSize) {
                    errorElement.textContent = `File "${file.name}" is too large. Max size is 2MB.`;
                    event.target.value = '';
                    previewContainer.innerHTML = '';
                    return;
                }
                if (!file.type.startsWith('image/')) {
                    errorElement.textContent = `File "${file.name}" is not a valid image.`;
                    event.target.value = '';
                    previewContainer.innerHTML = '';
                    return;
                }
            }

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.className = 'relative w-full h-24';
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-full w-full object-cover rounded-lg shadow-md';
                    imgWrapper.appendChild(img);
                    previewContainer.appendChild(imgWrapper);
                }
                reader.readAsDataURL(file);
            });
        }
        // Ensure this is placed after Alpine.js is loaded

        function experienceCompanyHandler(initialCompanies, oldCompanyId) {
            return {
                open: false,
                search: '',
                options: initialCompanies || [],
                filteredOptions: [],
                selectedOption: null,
                showCompanyForm: false,

                init() {
                    this.filteredOptions = [...this.options];
                    if (oldCompanyId) {
                        const found = this.options.find(opt => String(opt.value) === String(oldCompanyId));
                        if (found) {
                            this.selectOption(found, false);
                        }
                    }
                    this.search = this.selectedOption ? this.selectedOption.label : '';
                },

                filterOptions() {
                    if (!this.search) {
                        this.filteredOptions = [...this.options];
                        this.selectedOption = null;
                        return;
                    }
                    if (!this.selectedOption || this.search !== this.selectedOption.label) {
                        this.selectedOption = null;
                    }
                    this.filteredOptions = this.options.filter(item =>
                        item.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                },

                selectOption(item, closeDropdown = true) {
                    this.selectedOption = item;
                    this.search = item.label;
                    if (closeDropdown) {
                        this.open = false;
                    }
                    this.showCompanyForm = false;
                },

                toggleNewCompanyForm() {
                    this.showCompanyForm = !this.showCompanyForm;
                    this.open = false;
                    if (this.showCompanyForm) {
                        this.selectedOption = null;
                        this.search = '';
                    }
                },

                previewLogo(event, previewElementId) {
                    const reader = new FileReader();
                    const previewEl = document.getElementById(previewElementId);
                    reader.onload = (e) => {
                        if (previewEl) previewEl.src = e.target.result;
                    };
                    if (event.target.files && event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                    } else {
                        if (previewEl) previewEl.src = '';
                    }
                },

                async saveNewCompanyViaAjax(contextId) {
                    // `contextId` akan berisi '_create' atau nomor id (misal: '123')

                    // Mencari elemen dengan pola ID yang sudah standar
                    const errorDisplay = document.getElementById(`new_company_ajax_errors_modal-${contextId}`);
                    errorDisplay.innerHTML = '';

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');

                    // Mengambil nilai dari input yang benar menggunakan contextId
                    const companyName = document.getElementById(`new_company_name_modal-${contextId}`)?.value;
                    const companyField = document.getElementById(`new_company_field_modal-${contextId}`)?.value;
                    const companyAddress = document.getElementById(`new_company_address_modal-${contextId}`)?.value;
                    const companyDescription = document.getElementById(`new_company_description_modal-${contextId}`)
                        ?.value;

                    // Validasi Input
                    if (!companyName) {
                        errorDisplay.innerHTML = '<p>Company Name field is required.</p>';
                        return; // Berhenti jika nama kosong
                    } else if (!companyField) {
                        errorDisplay.innerHTML = '<p>Industry Type field is required.</p>';
                        return; // Berhenti jika industri kosong
                    } else if (!companyDescription) {
                        errorDisplay.innerHTML = '<p>Description field is required.</p>';
                        return; // Berhenti jika deskripsi kosong
                    }

                    formData.append('company_name', companyName);
                    formData.append('company_field', companyField);
                    formData.append('company_address', companyAddress || '');
                    formData.append('company_description', companyDescription);

                    const logoInput = document.getElementById(`new_company_logo_modal-${contextId}`);
                    if (logoInput && logoInput.files[0]) {
                        formData.append('company_picture', logoInput.files[0]);
                    }

                    const galleryInput = document.getElementById(`new_company_gallery_modal-${contextId}`);
                    if (galleryInput && galleryInput.files.length > 0) {
                        for (const file of galleryInput.files) {
                            formData.append('company_gallery[]', file);
                        }
                    }

                    try {
                        const response = await fetch('{{ route('companies.store.ajax') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();

                        if (!response.ok) {
                            let errorHtml = '<ul>';
                            for (const key in data.errors) {
                                errorHtml += `<li>${data.errors[key][0]}</li>`;
                            }
                            errorHtml += '</ul>';
                            errorDisplay.innerHTML = errorHtml;
                            return;
                        }

                        const newCompanyForAlpine = {
                            value: data.company.id_company,
                            label: data.company.company_name
                        };

                        if (!this.options.find(opt => String(opt.value) === String(newCompanyForAlpine.value))) {
                            this.options.unshift(newCompanyForAlpine);
                        }

                        this.filterOptions();
                        this.selectOption(newCompanyForAlpine);
                        this.showCompanyForm = false;

                        alert(data.message || 'Company saved and selected!');

                    } catch (error) {
                        console.error('AJAX save company error:', error);
                        errorDisplay.innerHTML = '<p>A network error occurred. Please try again.</p>';
                    }
                }
            }
        }

        function checkFileSize(input) {
            const errorContainer = input.closest('.space-y-4').querySelector('.company-logo-error');

            if (!errorContainer) {
                console.error("Could not find the .company-logo-error element.");
                return;
            }

            const file = input.files[0];
            // Jika pengguna batal memilih file, bersihkan pesan error
            if (!file) {
                errorContainer.textContent = "";
                return;
            }

            // --- Aturan Validasi ---
            const maxSizeInMB = 2;
            const maxSizeBytes = maxSizeInMB * 1024 * 1024;
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Tipe file yang diizinkan

            // 1. Validasi Ukuran File
            if (file.size > maxSizeBytes) {
                errorContainer.textContent = `File is too large. Max size is ${maxSizeInMB}MB.`;
                input.value = ""; // Hapus file yang tidak valid
                return;
            }

            // 2. Validasi Tipe File
            if (!allowedTypes.includes(file.type)) {
                errorContainer.textContent = 'Invalid file type. Only JPG, PNG, or GIF are allowed.';
                input.value = ""; // Hapus file yang tidak valid
                return;
            }

            // Jika semua validasi lolos, pastikan tidak ada pesan error
            errorContainer.textContent = "";
        }

        // Position Dropdown (similar to the one from previous response, ensure IDs are unique if needed)
        function positionDropdown(config) {
            return {
                open: false,
                search: '',
                options: config.options || [],
                filteredOptions: [],
                selectedOption: null,
                initialSelectedValue: config.initialSelectedValue || '',

                init() {
                    this.filteredOptions = [...this.options];
                    if (this.initialSelectedValue) {
                        const found = this.options.find(opt => String(opt.value) === String(this.initialSelectedValue));
                        if (found) {
                            this.selectOption(found, false);
                        } else if (this.initialSelectedValue) {
                            const newOpt = {
                                value: this.initialSelectedValue,
                                label: this.initialSelectedValue
                            };
                            this.options.unshift(newOpt);
                            this.filteredOptions.unshift(newOpt); // Also add to filteredOptions
                            this.selectOption(newOpt, false);
                        }
                    }
                    this.search = this.selectedOption ? this.selectedOption.label : '';
                },
                filterOptions() {
                    if (!this.search) {
                        this.filteredOptions = [...this.options];
                        this.selectedOption = null;
                        return;
                    }
                    if (!this.selectedOption || this.search !== this.selectedOption.label) {
                        this.selectedOption = null;
                    }
                    this.filteredOptions = this.options.filter(item =>
                        item.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                },
                selectOption(item, closeDropdown = true) {
                    this.selectedOption = item;
                    this.search = item.label;
                    if (closeDropdown) {
                        this.open = false;
                    }
                }
            }
        }

        // Initialize responsibility add/remove logic
        document.addEventListener('DOMContentLoaded', () => {
            const respContainerCreate = document.getElementById('responsibility-container-create');
            const addBtnCreate = document.getElementById('add-responsibility-create');
            if (respContainerCreate && addBtnCreate) {
                const maxResponsibilities = 3;

                const updateRemoveButtons = (container) => {
                    const items = container.querySelectorAll('.responsibility-item');
                    items.forEach((item, index) => {
                        const removeButton = item.querySelector('.remove-responsibility');
                        if (removeButton) {
                            removeButton.style.display = items.length === 1 ? 'none' :
                                'inline-flex';
                        }
                    });
                };

                const addField = (container, inputName) => {
                    if (container.children.length >= maxResponsibilities) {
                        alert(
                            `Maximum ${maxResponsibilities} ${inputName.replace('job_', '').replace('[]', '')} items allowed.`
                        );
                        return;
                    }
                    const newItemDiv = document.createElement('div');
                    newItemDiv.classList.add('responsibility-item', 'mb-2', 'flex',
                        'items-center'); // Use a generic class if needed or keep as 'responsibility-item'
                    newItemDiv.innerHTML = `
                <input type="text" name="${inputName}"
                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                    placeholder="Enter responsibility" />
                <button type="button"
                    class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">Remove</button>
            `;
                    container.appendChild(newItemDiv);
                    updateRemoveButtons(container);
                };

                addBtnCreate.addEventListener('click', () => addField(respContainerCreate,
                    'job_responsibility[]'));
                respContainerCreate.addEventListener('click', function(e) {
                    if (e.target && e.target.classList.contains('remove-responsibility')) {
                        e.target.closest('.responsibility-item').remove();
                        updateRemoveButtons(respContainerCreate);
                    }
                });
                updateRemoveButtons(respContainerCreate); // Initial call
            }

            // Datepicker end date logic
            const currentPositionCheckboxModal = document.getElementById('current_position_checkbox');
            const dateEndInputModal = document.getElementById('datepicker-range-end');
            if (currentPositionCheckboxModal && dateEndInputModal) {
                const updateEndDateStateModal = () => {
                    if (currentPositionCheckboxModal.checked) {
                        dateEndInputModal.value = '';
                        dateEndInputModal.disabled = true;
                        dateEndInputModal.removeAttribute('required');
                    } else {
                        dateEndInputModal.disabled = false;
                        dateEndInputModal.setAttribute('required', 'required');
                    }
                };
                currentPositionCheckboxModal.addEventListener('change', updateEndDateStateModal);
                updateEndDateStateModal(); // Initial state
            }
        });
    </script>
@endsection
